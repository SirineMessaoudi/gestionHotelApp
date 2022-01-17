<?php


namespace HotelBundle\Controller;

use HotelBundle\Entity\User;
use HotelBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class RegisterController extends Controller
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function RegisterAction(Request $request){

        $user =new User();
        $form = $this->createForm(UserType::class,$user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //create the user
            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl("Hotel_register"));
        }
        return $this->render('@Hotel/Register/register.html.twig',
            array(
                'UserType'=> $form->createView()
            ));
    }
}
