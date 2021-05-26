<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    /**
     * @Route("/", name="security_login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $user = $this->getUser();

        $error = $authenticationUtils->getLastAuthenticationError();
        $last_username = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'user' => $user,
            'error' => $error,
            'last_username' => $last_username
        ]);
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout(){}

}
