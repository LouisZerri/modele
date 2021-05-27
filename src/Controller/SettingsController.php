<?php

namespace App\Controller;

use App\Entity\Country;
use App\Entity\Face;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SettingsController extends AbstractController
{
    /**
     * @Route("/parametres", name="parametres")
     */
    public function index(Request $request, EntityManagerInterface $em): Response
    {

        $user = $this->getUser();

        $erreurs = array();

        if($request->getMethod() == 'POST')
        {
            $data = $request->request->all();

            if(is_numeric($data['country']))
            {   
                $erreurs['country'] = "Le pays n'est pas une valeur valide";
            }

            if(is_numeric($data['morphology']))
            {   
                $erreurs['morphology'] = "La morphologie du visage n'est pas une valeur valide";
            }

            if(empty($erreurs))
            {

                if($data['country'] != "" && $data['morphology'] != "")
                {
                    $country = new Country();
                    $country->setName($data['country']);

                    $morphology = new Face();
                    $morphology->setMorphology($data['morphology']);

                    $em->persist($country);
                    $em->persist($morphology);
                    $em->flush();
                    $this->addFlash('success', 'Pays et morphologie du visage ajouté à la liste avec succès');
                }
                else if($data['country'] != "" && $data['morphology'] == "")
                {
                    $country = new Country();
                    $country->setName($data['country']);
                    $em->persist($country);
                    $em->flush();
                    $this->addFlash('success', 'Pays ajouté à la liste avec succès');
                }
                else if($data['country'] == "" && $data['morphology'] != "")
                {
                    $morphology = new Face();
                    $morphology->setMorphology($data['morphology']);
                    $em->persist($morphology);
                    $em->flush();
                    $this->addFlash('success', 'La morphologie du visage a ajouté à la liste avec succès');
                }
                else if($data['country'] == "" && $data['morphology'] == "")
                {
                    $this->addFlash('success', 'Aucun ajout a été effectué');
                }

                return $this->redirectToRoute('parametres');

            }
        }

        return $this->render('settings/index.html.twig', [
            'user' => $user,
        ]);
    }

}
