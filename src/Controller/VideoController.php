<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Video;
use App\Repository\VideoRepository;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\VideoType;
use Knp\Component\Pager\PaginatorInterface;
use App\Form\UserFormType;
use App\Entity\User;
use Symfony\Component\Security\Core\Security;



    class VideoController extends AbstractController
    {
      
            #[Route('/home', name: 'app_home')]
            public function index(Request $request, PaginatorInterface $paginator, VideoRepository $videoRepository): Response
            {
                
        
                $pagination = $paginator->paginate(
                    $videoRepository->paginationQuery(),
                    $request->query->getInt('page', 1),
                    9
                );
                
            
                
        
                return $this->render('video/index.html.twig', [
                 
                    'pagination' => $pagination
                ]);
            }
        
        
    
    



    
    
  

    #[Route('/video/creer', name: 'app_video_create', methods: ['GET', 'POST'])]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
       
        if (!$this->getUser()) {
            $this->addFlash('error', 'Vous devez vous connecter pour créer une vidéo !');
            return $this->redirectToRoute('app_login');
        }
    
        $video = new Video();
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
           
            $videoLink = $form->get('videoLink')->getData();
           
            $video->setUser($this->getUser());
    
            $em->persist($video);
            $em->flush();
    
            $this->addFlash('success', 'Vidéo créée avec succès !');
            return $this->redirectToRoute('app_home');
        }
    
        return $this->render('video/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route("/video/{id<[0-9]+>}/modifier", name:"app_video_edit", methods:["GET","POST"])]
    public function edit(Request $request, Video $video, EntityManagerInterface $em): Response
    {
        if ($this->getUser()) {
            if ($this->getUser()->isVerified() == false) {
                $this->addFlash('error', 'Vous devez confirmer votre e-mail pour modifier la vidéo !');
                return $this->redirectToRoute('app_home');
            } else if ($video->getUser()->getEmail() !== $this->getUser()->getEmail()) {
                $this->addFlash('error', 'Vous devez être l\'utilisateur ' . $video->getUser()->getFirstname() . ' pour modifier la vidéo !');
                return $this->redirectToRoute('app_home');
            }
        } else {
            $this->addFlash('error', 'Vous devez vous connecter pour modifier la vidéo !');
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $video->setUser($this->getUser());
            $this->addFlash('success', 'Vidéo modifiée avec succès !');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('video/edit.html.twig', [
            'video' => $video,
            'form' => $form->createView()
        ]);
    }

    #[Route("/video/{id<[0-9]+>}/supprimer", name:"app_video_delete")]
    public function delete(Video $video, EntityManagerInterface $em): Response
    {
        if ($this->getUser()) {
            if ($this->getUser()->isVerified() == false) {
                $this->addFlash('error', 'Vous devez confirmer votre e-mail pour supprimer la vidéo !');
                return $this->redirectToRoute('app_home');
            } else if ($video->getUser()->getEmail() !== $this->getUser()->getEmail()) {
                $this->addFlash('error', 'Vous devez être l\'utilisateur ' . $video->getUser()->getFirstname() . ' pour supprimer la vidéo !');
                return $this->redirectToRoute('app_home');
            }
        } else {
            $this->addFlash('error', 'Vous devez vous connecter pour supprimer la vidéo !');
            return $this->redirectToRoute('app_login');
        }

        $em->remove($video);
        $em->flush();
        $this->addFlash('success', 'Vidéo supprimée avec succès !');
        return $this->redirectToRoute('app_home');
    }

    #[Route('/video/{id<[0-9]+>}/show', name: 'app_video_show', methods: ['GET'])]
    public function show(Video $video): Response
    {
        if ($video->isPremiumVideo() && !$this->getUser()) {
            $this->addFlash('error', 'Vous devez vous connecter ou vous inscrire pour avoir accès  aux vidéos premiums.');
            return $this->redirectToRoute('app_login');
        }
    
        return $this->render('video/show.html.twig', compact('video'));
    }
    
    #[Route('/video/{id<[0-9]+>}/profil', name: 'app_video_profile', methods: ['GET', 'POST'])]
    public function editProfile(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        $form = $this->createForm(UserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
      
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Photo de profil téléchargée avec succès.');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('video/profile.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
            'submitButtonText' => 'Mettre à jour la vidéo',
        ]);
    }

    #[Route('/video/update', name: 'app_video_update', methods: ['GET', 'POST'])]
    public function updateProfile(Request $request): Response
    {
        // Get the current user
        $user = $this->getUser();

        // Create the form for updating the profile
        $form = $this->createForm(UserFormType::class, $user);

        // Handle the form submission
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Save the updated profile to the database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            // Optionally, add a success message
            $this->addFlash('success', 'Profile updated successfully!');

            // Redirect to another page after updating the profile
            return $this->redirectToRoute('home'); // Replace 'home' with the route name of your desired page
        }

        // Render the update.html.twig template with the profile form
        return $this->render('video/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // ...
}






