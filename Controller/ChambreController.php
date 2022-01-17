<?php


namespace HotelBundle\Controller;


use HotelBundle\Entity\Chambre;
use HotelBundle\Form\ChambreForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ChambreController extends Controller
{
    public function listAction(){
    $em = $this->container->get('doctrine')->getEntityManager();

    $chambres = $em->getRepository('HotelBundle:Chambre')->findAll();

    return $this->render('@Hotel/Chambre/list.html.twig', array('chambres' => $chambres));
    }

    //add chambre
    public function ajouterAction(Request $request)
    {
        $chambre =new Chambre();
        $form = $this->createForm(ChambreForm::class,$chambre);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($chambre);
            $em->flush();
            return $this->redirect($this->generateUrl("Hotel_affichage_chambre"));
        }

        return $this->render('@Hotel/Chambre/ajouter.html.twig',
            array(
                'ChambreForm'=> $form->createView()
            ));
    }
    //delete chambre
    public function supprimerAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $chambre = $em->getRepository('HotelBundle:Chambre')->find($id);
        if ($chambre !==null)
        {
            $em->remove($chambre);
            $em->flush();
        }
        else{
            throw new NotFoundHttpException("la chambre d'id".$id."n'existe pas");
        }
        return $this->redirectToRoute("Hotel_affichage_chambre");
    }
    //update chambre
    public function modifierAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $chambre =$em->getRepository('HotelBundle:Chambre')->find($id);

        $form = $this->createForm(ChambreForm::class,$chambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($chambre);
            $em->flush();
            return $this->redirect($this->generateUrl("Hotel_affichage_chambre"));
        }

        return $this->render('@Hotel/Chambre/modifier.html.twig',
            array(
                'ChambreForm'=> $form->createView()
            ));
    }
    //rechercher un chambre
    public function rechercheAction(Request $request){
        $em=$this->container->get('doctrine')->getEntityManager();

        $chambre= $em->getRepository('HotelBundle:Chambre')->findAll();
        if ($request->getMethod("POST")) {
            $motcle = $request->get('input_recherche');
            $query = $em->createQuery("SELECT ch FROM HotelBundle:Chambre ch WHERE ch.numChambre LIKE '".$motcle."%' ");
            $chambres = $query->getResult();
        }
        return $this->render('@Hotel/Chambre/rechercheChambre.html.twig',
            array(
                'chambres'=>$chambres
            ));
    }
}
