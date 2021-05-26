<?php

namespace App\Controller;

use App\Entity\Men;
use App\Entity\ModeleSearch;
use App\Entity\PictureWomen;
use App\Entity\Women;
use App\Form\ModeleMenType;
use App\Form\ModeleSearchType;
use App\Form\ModeleWomenType;
use App\Repository\MenRepository;
use App\Repository\WomenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var WomenRepository
     */
    private $womenRepository;

    /**
     * @var MenRepository
     */
    private $menRepository;

    public function __construct(WomenRepository $womenRepository, MenRepository $menRepository, EntityManagerInterface $em)
    {
        $this->womenRepository = $womenRepository;
        $this->menRepository = $menRepository;
        $this->em = $em;
    }

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index()
    {
        $user = $this->getUser();

        $countWomen = $this->womenRepository->countWomen();
        $countMen = $this->menRepository->countMen();

        $averageWomen = $this->womenRepository->averageWomen();
        $averageMen = $this->menRepository->averageMen();


        return $this->render('dashboard/dashboard.html.twig', [
            'user' => $user,
            'men' => $countMen,
            'women' => $countWomen,
            'averageWomen' => $averageWomen,
            'averageMen' => $averageMen
        ]);
    }

    /**
     * @Route("/modele/femme", name="modele_femme")
     */
    public function womenModele(PaginatorInterface $paginator, Request $request)
    {
        $user = $this->getUser();

        $search = new ModeleSearch();
        $form = $this->createForm(ModeleSearchType::class, $search);
        $form->handleRequest($request);

        $women = $paginator->paginate($this->womenRepository->findAllVisibleQuery($search), $request->query->getInt('page', 1), 5);

        return $this->render('dashboard/women.html.twig', [
            'user' => $user,
            'women' => $women,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/modele/femme/ajouter", name="ajout_modele_femme")
     * @param Request $request
     */
    public function addWomenModele(Request $request)
    {
        $user = $this->getUser();
        $women = new Women();

        $form = $this->createForm(ModeleWomenType::class, $women);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->persist($women);
            $this->em->flush();
            $this->addFlash('success', 'Modèle ajouté avec succès');
            return $this->redirectToRoute('modele_femme');
        }

        return $this->render('dashboard/modele_femme/new.html.twig', [
            'user' => $user,
            'women' => $women,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/modele/femme/{id}", name="edit_modele_femme", methods="GET|POST")
     * @param Women $women
     * @param Request $request
     */
    public function editWomenModele(Women $women, Request $request)
    {
        $user = $this->getUser();

        $form = $this->createForm(ModeleWomenType::class, $women);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
            $this->addFlash('success','Modèle modifié avec succès');
            return $this->redirectToRoute('modele_femme');
        }

        return $this->render('dashboard/modele_femme/edit.html.twig',[
            'user' => $user,
            'women' => $women,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/modele/femme/{id}", name="delete_modele_femme", methods="DELETE")
     * @param Women $women
     * @param Request $request
     * @return RedirectResponse
     */
    public function deleteWomenModele(Women $women, Request $request)
    {
        if($this->isCsrfTokenValid('delete'.$women->getId(), $request->get('_token')))
        {
            $this->em->remove($women);
            $this->em->flush();
            $this->addFlash('success','Modèle supprimé avec succès');
        }

        return $this->redirectToRoute('modele_femme');
    }


    /**
     * @Route("/modele/homme", name="modele_homme")
     */
    public function menModele(PaginatorInterface $paginator, Request $request)
    {
        $user = $this->getUser();

        $search = new ModeleSearch();
        $form = $this->createForm(ModeleSearchType::class, $search);
        $form->handleRequest($request);

        $men = $paginator->paginate($this->menRepository->findAllVisibleQuery($search), $request->query->getInt('page', 1), 5);

        return $this->render('dashboard/men.html.twig', [
            'user' => $user,
            'men' => $men,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/modele/homme/ajouter", name="ajout_modele_homme")
     * @param Request $request
     */
    public function addMenModele(Request $request)
    {
        $user = $this->getUser();
        $men = new Men();

        $form = $this->createForm(ModeleMenType::class, $men);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->persist($men);
            $this->em->flush();
            $this->addFlash('success', 'Modèle ajouté avec succès');
            return $this->redirectToRoute('modele_homme');
        }

        return $this->render('dashboard/modele_homme/new.html.twig', [
            'user' => $user,
            'men' => $men,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/modele/homme/{id}", name="edit_modele_homme", methods="GET|POST")
     * @param Women $women
     * @param Request $request
     */
    public function editMenModele(Men $men, Request $request)
    {
        $user = $this->getUser();

        $form = $this->createForm(ModeleMenType::class, $men);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
            $this->addFlash('success','Modèle modifié avec succès');
            return $this->redirectToRoute('modele_homme');
        }

        return $this->render('dashboard/modele_homme/edit.html.twig',[
            'user' => $user,
            'men' => $men,
            'form' => $form->createView()
        ]);

    }


    /**
     * @Route("/modele/homme/{id}", name="delete_modele_homme", methods="DELETE")
     * @param Women $women
     * @param Request $request
     * @return RedirectResponse
     */
    public function deleteChallenge(Men $men, Request $request)
    {
        if($this->isCsrfTokenValid('delete'.$men->getId(), $request->get('_token')))
        {
            $this->em->remove($men);
            $this->em->flush();
            $this->addFlash('success','Modèle supprimé avec succès');
        }

        return $this->redirectToRoute('modele_homme');
    }

}
