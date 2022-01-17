<?php


namespace HotelBundle\Controller;

use HotelBundle\Entity\User;
use HotelBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{

    /**
     * @param Request $request
     * @return void
     */
    public function loginAction(Request $request)

       {
          return $this->render('@Hotel/Login/login.html.twig',array());
        }



}
