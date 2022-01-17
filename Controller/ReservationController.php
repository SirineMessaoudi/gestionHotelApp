<?php


namespace HotelBundle\Controller;

use HotelBundle\Entity\Reservation;
use HotelBundle\Form\ReservationForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * Reservation controller.
 *
 * @Route("/reservation")
 */
class ReservationController extends Controller
{
    /**
     * Lists all Reservation entities.
     *
     * @Route("/reservation", name="Hotel_affichage_reservation")
     * @Method("GET")
     */
    public function listAction(){
        $em = $this->container->get('doctrine')->getEntityManager();

        $reservations = $em->getRepository('HotelBundle:Reservation')->findAll();

        return $this->render('@Hotel/Reservation/list.html.twig',
            array('reservations' => $reservations));
    }
    /**
     * Creates a new Reservation entity.
     *
     * @Route("/ajouterReservation", name="Hotel_ajouter_reservation")
     * @Method({"GET", "POST"})
     */
    //add Reservation
    public function ajouterAction(Request $request)
    {
        $reservation =new reservation();
        $form = $this->createForm(ReservationForm::class,$reservation);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();
            return $this->redirect($this->generateUrl("Hotel_affichage_reservation"));
        }

        return $this->render('@Hotel/Reservation/ajouter.html.twig',
            array(
                'ReservationForm'=> $form->createView()
            ));
    }

    /**
     * Deletes a Reservation entity.
     *
     * @Route("/supprimerReservation/{id}", name="Hotel_supprimer_reservation")
     * @Method("DELETE")
     */
    //delete Reservation
    public function supprimerAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $reservation = $em->getRepository('HotelBundle:Reservation')->find($id);
        if ($reservation !==null)
        {
            $em->remove($reservation);
            $em->flush();
        }
        else{
            throw new NotFoundHttpException("l'Reservation d'id".$id."n'existe pas");
        }
        return $this->redirectToRoute("Hotel_affichage_reservation");
    }


    /**
     * Displays a form to edit an existing Reservation entity.
     *
     * @Route("/modifierReservatin/{id}/edit", name="Hotel_modifier_reservation")
     * @Method({"GET", "POST"})
     */
    //update Reservation
    public function modifierAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $reservation =$em->getRepository('HotelBundle:Reservation')->find($id);

        $reservationform = $this->createForm(ReservationForm::class,$reservation);
        $reservationform->handleRequest($request);

        if ($reservationform->isSubmitted() && $reservationform->isValid())
        {
            $em->persist($reservation);
            $em->flush();
            return $this->redirect($this->generateUrl("Hotel_affichage_reservation"));
        }

        return $this->render('@Hotel/Reservation/modifier.html.twig',
            array(
                'ReservationForm'=> $reservationform->createView()
            ));
    }

    /**
     * Finds and displays a Reservation entity.
     *
     * @Route("/rechercheReservation/{id}", name="Hotel_rechercher_reservation")
     * @Method("GET")
     */
    //rechercher un Reservation
    public function rechercheAction(Request $request){
        $em=$this->container->get('doctrine')->getEntityManager();

        $reservations= $em->getRepository('HotelBundle:Reservation')->findAll();
        if ($request->getMethod("POST")) {
            $motcle = $request->get('input_recherche');
            $query = $em->createQuery("SELECT a FROM HotelBundle:Reservation a WHERE a.codeReservation LIKE '".$motcle."%' ");
            $reservations = $query->getResult();
        }
        return $this->render('@Hotel/Reservation/rechercheReservation.html.twig',
            array(
                'reservations'=>$reservations
            ));
    }


    /**
     * Creates a form to delete a Reservation entity.
     *
     * @param \HotelBundle\Entity\Reservation $reservation The Reservation entity
     *
     * @return \Symfony\Component\Form\FormInterface The form
     */
    private function createDeleteForm(Reservation $reservation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservation_delete', array('id' => $reservation->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }





}
