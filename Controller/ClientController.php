<?php


namespace HotelBundle\Controller;


use HotelBundle\Entity\Client;
use HotelBundle\Form\ClientForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ClientController extends Controller
{
    public function listAction(){
    $em = $this->container->get('doctrine')->getEntityManager();

    $clients = $em->getRepository('HotelBundle:Client')->findAll();

    return $this->render('@Hotel/Client/list.html.twig', array('clients' => $clients));
    }

    //add client
    public function ajouterAction(Request $request)
    {
        $client =new Client();
        $form = $this->createForm(ClientForm::class,$client);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            return $this->redirect($this->generateUrl("Hotel_affichage_client"));
        }

        return $this->render('@Hotel/Client/ajouter.html.twig',
            array(
                'ClientForm'=> $form->createView()
            ));
    }
    //delete client
    public function supprimerAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $client = $em->getRepository('HotelBundle:Client')->find($id);
        if ($client !==null)
        {
            $em->remove($client);
            $em->flush();
        }
        else{
            throw new NotFoundHttpException("le client d'id".$id."n'existe pas");
        }
        return $this->redirectToRoute("Hotel_affichage_client");
    }
    //update client
    public function modifierAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $client =$em->getRepository('HotelBundle:Client')->find($id);

        $clientform = $this->createForm(ClientForm::class,$client);
        $clientform->handleRequest($request);

        if ($clientform->isSubmitted() && $clientform->isValid())
        {
            $em->persist($client);
            $em->flush();
            return $this->redirect($this->generateUrl("Hotel_affichage_client"));
        }

        return $this->render('@Hotel/Client/modifier.html.twig',
            array(
                'ClientForm'=> $clientform->createView()
            ));
    }
    //rechercher un client
    public function rechercheAction(Request $request){
        $em=$this->container->get('doctrine')->getEntityManager();

        $clients= $em->getRepository('HotelBundle:Client')->findAll();
        if ($request->getMethod("POST")) {
            $motcle = $request->get('input_recherche');
            $query = $em->createQuery("SELECT c FROM HotelBundle:Client c WHERE c.nom LIKE '".$motcle."%' ");
            $clients = $query->getResult();
        }
        return $this->render('@Hotel/Client/rechercheReservation.html.twig',
            array(
                'clients'=>$clients
            ));
    }
}
