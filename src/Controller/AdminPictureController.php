<?php

namespace App\Controller;

use App\Entity\PictureWomen;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminPictureController extends AbstractController
{
    /**
     * @Route("/women/{id}", name="delete_picture_women", methods="DELETE")
     */
    public function deletePictureWomen(PictureWomen $picture, Request $request) {

        $data = json_decode($request->getContent(), true);

        if ($this->isCsrfTokenValid('delete' . $picture->getId(), $data['_token'])) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($picture);
            $em->flush();
            return new JsonResponse(['success' => 1]);
        }

        return new JsonResponse(['error' => 'Token invalide'], 400);
    }
}
