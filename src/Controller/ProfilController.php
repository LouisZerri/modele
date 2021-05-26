<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfilController extends AbstractController
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $em)
    {
        $this->userRepository = $userRepository;
        $this->em = $em;
    }

    /**
     * @Route("/dashboard/team", name="team")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $user = $this->getUser();

        $users = $paginator->paginate($this->userRepository->findAllVisibleQuery(), $request->query->getInt('page', 1), 5);

        return $this->render('team/index.html.twig', [
            'user' => $user,
            'users' => $users
        ]);
    }

    /**
     * @Route("/team/utilisateur/ajouter", name="ajout_utilisateur")
     * @param Request $request
     */
    function createUser(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $userConnect = $this->getUser();
        $user = new User();

        $erreurs = array();

        if($request->getMethod() == 'POST')
        {
            $data = $request->request->all();

            if($data['title'] == "")
            {   
                $erreurs['titre'] = "Le titre ne doit pas être vide";
            }

            if($data['firstname'] == "" || is_numeric($data['firstname']))
            {   
                $erreurs['prenom'] = "Le champ n'est pas correctement rempli";
            }

            if($data['lastname'] == "" || is_numeric($data['lastname']))
            {   
                $erreurs['nom'] = "Le champ n'est pas correctement rempli";
            }

            if($data['email'] == "" || !preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $data['email']))
            {   
                $erreurs['email'] = "L'email n'est pas de la bonne forme";
            }

            if($data['password'] == "")
            {   
                $erreurs['password'] = "Le champ n'est pas correctement rempli";
            }

            if($data['roles'] == "")
            {   
                $erreurs['role'] = "Le champ n'est pas correctement rempli";
            }

            if(empty($erreurs))
            {
                $user = new User();
                $user
                    ->setTitle($data['title'])
                    ->setFirstname($data['firstname'])
                    ->setLastname($data['lastname'])
                    ->setEmail($data['email']);

                $hash = $encoder->encodePassword($user, $data['password']);
                $user->setPassword($hash);

                if($data['roles'] == 'admin_gold')
                {
                    $user->setRoles('ROLE_ADMIN_GOLD');
                }
                elseif($data['roles'] == 'admin_silver')
                {
                    $user->setRoles('ROLE_ADMIN_SILVER');
                }
                elseif($data['roles'] == 'admin_bronze')
                {
                    $user->setRoles('ROLE_ADMIN_BRONZE');
                }

                $this->em->persist($user);
                $this->em->flush();

                $this->addFlash('success', 'Utilisateur ajouté avec succès');
                return $this->redirectToRoute('team');

            }
        }

        return $this->render('team/new.html.twig', [
            'user' => $userConnect,
            'erreurs' => $erreurs
        ]);
    }

    /**
     * @Route("/team/utilisateur/{id}", name="edit_utilisateur", methods="GET|POST")
     * @param User $user
     * @param Request $request
     */
    function editUser(Request $request, User $user, UserPasswordEncoderInterface $encoder)
    {
        $userConnect = $this->getUser();

        $currentUser = $this->userRepository->findOneBy(['id' => $user]);

        $erreurs = array();

        if($request->getMethod() == 'POST')
        {
            $data = $request->request->all();

            if($data['title'] == "")
            {   
                $erreurs['titre'] = "Le titre ne doit pas être vide";
            }

            if($data['firstname'] == "" || is_numeric($data['firstname']))
            {   
                $erreurs['prenom'] = "Le champ concernant le prénom n'est pas correctement rempli";
            }

            if($data['lastname'] == "" || is_numeric($data['lastname']))
            {   
                $erreurs['nom'] = "Le champ concernant le nom n'est pas correctement rempli";
            }

            if($data['email'] == "" || !preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $data['email']))
            {   
                $erreurs['email'] = "L'email n'est pas de la bonne forme";
            }

            if($data['password'] == "")
            {   
                $erreurs['password'] = "Le champ du mot de passe n'est pas correctement rempli";
            }

            if($data['roles'] == "")
            {   
                $erreurs['role'] = "Le champ des rôles n'est pas correctement rempli";
            }

            if(empty($erreurs))
            {

                $currentUser
                    ->setTitle($data['title'])
                    ->setFirstname($data['firstname'])
                    ->setLastname($data['lastname'])
                    ->setEmail($data['email']);

                $hash = $encoder->encodePassword($currentUser, $data['password']);
                $currentUser->setPassword($hash);

                if($data['roles'] == 'admin_gold')
                {
                    $currentUser->setRoles('ROLE_ADMIN_GOLD');
                }
                elseif($data['roles'] == 'admin_silver')
                {
                    $currentUser->setRoles('ROLE_ADMIN_SILVER');
                }
                elseif($data['roles'] == 'admin_bronze')
                {
                    $currentUser->setRoles('ROLE_ADMIN_BRONZE');
                }

                $this->em->flush();

                $this->addFlash('success', 'Utilisateur modifié avec succès');
                return $this->redirectToRoute('team');

            }
        }

        return $this->render('team/edit.html.twig', [
            'user' => $userConnect,
            'currentUser' => $currentUser,
            'erreurs' => $erreurs
        ]);

    }

    /**
     * @Route("/team/utilisateur/{id}", name="delete_utilisateur", methods="DELETE")
     * @param User $user
     * @param Request $request
     * @return RedirectResponse
     */
    public function deleteUser(User $user, Request $request)
    {
        if($this->isCsrfTokenValid('delete'.$user->getId(), $request->get('_token')))
        {
            $this->em->remove($user);
            $this->em->flush();
            $this->addFlash('success','Utilisateur supprimé avec succès');
        }

        return $this->redirectToRoute('team');
    }

    /**
     * @Route("/mon-profil", name="profil")
     * @param User $user
     */
    public function viewProfil()
    {
        $user = $this->getUser();

        return $this->render('profil/index.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/mon-profil/editer", name="edit_profil", methods="GET|POST")
     * @param User $user
     * @param Request $request
     */
    function editProfil(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = $this->getUser();

        $erreurs = array();

        if($request->getMethod() == 'POST')
        {
            $data = $request->request->all();

            if($data['title'] == "")
            {   
                $erreurs['titre'] = "Le titre ne doit pas être vide";
            }

            if($data['firstname'] == "" || is_numeric($data['firstname']))
            {   
                $erreurs['prenom'] = "Le champ concernant le prénom n'est pas correctement rempli";
            }

            if($data['lastname'] == "" || is_numeric($data['lastname']))
            {   
                $erreurs['nom'] = "Le champ concernant le nom n'est pas correctement rempli";
            }

            if($data['email'] == "" || !preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $data['email']))
            {   
                $erreurs['email'] = "L'email n'est pas de la bonne forme";
            }

            if($data['password'] == "")
            {   
                $erreurs['password'] = "Le champ du mot de passe n'est pas correctement rempli";
            }

            if(empty($erreurs))
            {

                $user
                    ->setTitle($data['title'])
                    ->setFirstname($data['firstname'])
                    ->setLastname($data['lastname'])
                    ->setEmail($data['email']);

                $hash = $encoder->encodePassword($user, $data['password']);
                $user->setPassword($hash);

                $this->em->flush();

                $this->addFlash('success', 'Votre profil a été modifié avec succès');
                return $this->redirectToRoute('profil');

            }
        }

        return $this->render('profil/edit.html.twig', [
            'user' => $user,
            'erreurs' => $erreurs
        ]);

    }




}
