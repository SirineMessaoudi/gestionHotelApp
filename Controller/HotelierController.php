<?php


namespace HotelBundle\Controller;


use HotelBundle\Form\HotelierForm;
use HotelBundle\Entity\Hotelier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HotelierController extends Controller
{
    public function listAction(){
    $em = $this->container->get('doctrine')->getEntityManager();

    $hoteliers = $em->getRepository('HotelBundle:Hotelier')->findAll();

    return $this->render('@Hotel/Hotelier/list.html.twig', array('hoteliers' => $hoteliers));
}

    //add Hotelier
    public function ajouterAction(Request $request)
    {
        $Hotelier =new Hotelier();
        $form = $this->createForm(HotelierForm::class,$Hotelier);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($Hotelier);
            $em->flush();
            return $this->redirect($this->generateUrl("Hotel_affichage_hotelier"));
        }

        return $this->render('@Hotel/Hotelier/ajouter.html.twig',
            array(
                'HotelierForm'=> $form->createView()
            ));
    }
    //delete Hotelier
    public function supprimerAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $Hotelier = $em->getRepository('HotelBundle:Hotelier')->find($id);
        if ($Hotelier !==null)
        {
            $em->remove($Hotelier);
            $em->flush();
        }
        else{
            throw new NotFoundHttpException("l'hotelier d'id".$id."n'existe pas");
        }
        return $this->redirectToRoute("Hotel_affichage_hotelier");
    }
    //update Hotelier
    public function modifierAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $Hotelier =$em->getRepository('HotelBundle:Hotelier')->find($id);

        $Hotelierform = $this->createForm(HotelierForm::class,$Hotelier);
        $Hotelierform->handleRequest($request);

        if ($Hotelierform->isSubmitted() && $Hotelierform->isValid())
        {
            $em->persist($Hotelier);
            $em->flush();
            return $this->redirect($this->generateUrl("Hotel_affichage_hotelier"));
        }

        return $this->render('@Hotel/Hotelier/modifier.html.twig',
            array(
                'HotelierForm'=> $Hotelierform->createView()
            ));
    }
    //rechercher un hotelier
    public function rechercheAction(Request $request){
        $em=$this->container->get('doctrine')->getEntityManager();

        $hoteliers= $em->getRepository('HotelBundle:Hotelier')->findAll();
        if ($request->getMethod("POST")) {
            $motcle = $request->get('input_recherche');
            $query = $em->createQuery("SELECT h FROM HotelBundle:Hotelier h WHERE h.nom LIKE '".$motcle."%' ");
            $hoteliers = $query->getResult();
        }
        return $this->render('@Hotel/Hotelier/rechercheHotelier.html.twig',
            array(
                'hoteliers'=>$hoteliers
            ));
    }


}
