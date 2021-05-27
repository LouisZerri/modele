<?php

namespace App\Controller;

use App\Entity\Men;
use App\Entity\Women;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModeleController extends AbstractController
{
    /**
     * @Route("/modele/femme/{id}", name="view_women_modele")
     */
    public function viewWomanModele(Women $women): Response
    {

        $user = $this->getUser();

        return $this->render('modele/woman.html.twig', [
            'user' => $user,
            'woman' => $women
        ]);
    }

    /**
     * @Route("/modele/homme/{id}", name="view_men_modele")
     */
    public function viewManModele(Men $men): Response
    {

        $user = $this->getUser();

        return $this->render('modele/man.html.twig', [
            'user' => $user,
            'man' => $men
        ]);
    }
}
