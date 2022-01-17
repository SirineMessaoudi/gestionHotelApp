<?php


namespace HotelBundle\Controller;


use HotelBundle\Form\AdministrateurForm;
use HotelBundle\Entity\Administrateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdministrateurController extends Controller
{
    public function listAction(){
        $em = $this->container->get('doctrine')->getEntityManager();

        $administrateurs = $em->getRepository('HotelBundle:Administrateur')->findAll();

        return $this->render('@Hotel/Administrateur/list.html.twig', array('administrateurs' => $administrateurs));
    }

    //add Administrateur
    public function ajouterAction(Request $request)
    {
        $Administrateur =new Administrateur();
        $form = $this->createForm(AdministrateurForm::class,$Administrateur);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($Administrateur);
            $em->flush();
            return $this->redirect($this->generateUrl("Hotel_affichage_administrateur"));
        }

        return $this->render('@Hotel/Administrateur/ajouter.html.twig',
            array(
                'AdministrateurForm'=> $form->createView()
            ));
    }
    //delete Administrateur
    public function supprimerAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $Administrateur = $em->getRepository('HotelBundle:Administrateur')->find($id);
        if ($Administrateur !==null)
        {
            $em->remove($Administrateur);
            $em->flush();
        }
        else{
            throw new NotFoundHttpException("l'administrateur d'id".$id."n'existe pas");
        }
        return $this->redirectToRoute("Hotel_affichage_administrateur");
    }
    //update Administrateur
    public function modifierAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $administrateur =$em->getRepository('HotelBundle:Administrateur')->find($id);

        $administrateurform = $this->createForm(AdministrateurForm::class,$administrateur);
        $administrateurform->handleRequest($request);

        if ($administrateurform->isSubmitted() && $administrateurform->isValid())
        {
            $em->persist($administrateur);
            $em->flush();
            return $this->redirect($this->generateUrl("Hotel_affichage_administrateur"));
        }

        return $this->render('@Hotel/Administrateur/modifier.html.twig',
            array(
                'AdministrateurForm'=> $administrateurform->createView()
            ));
    }
    //rechercher un administrateur
    public function rechercheAction(Request $request){
        $em=$this->container->get('doctrine')->getEntityManager();

        $administrateurs= $em->getRepository('HotelBundle:Administrateur')->findAll();
        if ($request->getMethod("POST")) {
            $motcle = $request->get('input_recherche');
            $query = $em->createQuery("SELECT a FROM HotelBundle:Administrateur a WHERE a.nom LIKE '".$motcle."%' ");
            $administrateurs = $query->getResult();
        }
        return $this->render('@Hotel/Administrateur/rechercheAdministrateur.html.twig',
            array(
                'administrateurs'=>$administrateurs
            ));
    }
}
