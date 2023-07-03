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

class VideoController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ManagerRegistry $doctrine, VideoRepository $repo): Response
    {
//       $video1 = new Video;
// $video1->setTitle(" titre doit être limité à vingt character");
// $video1->setDescription("Description Video 1");
// $video1->setVideoLink('<iframe width="300" height="200" src="https://www.youtube.com/embed/lcZDWo6hiuI"></iframe>');

// $video2 = new Video;
// $video2->setTitle("Video 2");
// $video2->setDescription("Description Video 2");
// $video2->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/kmCAm4_hlyQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');

// $video3 = new Video;
// $video3->setTitle("Video 3");
// $video3->setDescription("Description Video 3");
// $video3->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/coX4b3juSgM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');

// $video4 = new Video;
// $video4->setTitle("Video 4");
// $video4->setDescription("Description Video 4");
// $video4->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/Id7NcfkXLfU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');

// $video5 = new Video;
// $video5->setTitle("Video 5");
// $video5->setDescription("Description Video 5");
// $video5->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');

// $video6 = new Video;
// $video6->setTitle("Video 6");
// $video6->setDescription("Description Video 6");
// $video6->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');

// $video7 = new Video;
// $video7->setTitle("Video 7");
// $video7->setDescription("Description Video 7");
// $video7->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');

// $video8 = new Video;
// $video8->setTitle("Video 8");
// $video8->setDescription("Description Video 8");
// $video8->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media;');
//     $video9 = new Video;
//     $video9->setTitle("Video 9");
//     $video9->setDescription("Description Video 9");
//     $video9->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video9" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
    
//     $video10 = new Video;
//     $video10->setTitle("Video 10");
//     $video10->setDescription("Description Video 10");
//     $video10->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video10" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
    
//     $video11 = new Video;
//     $video11->setTitle("Video 11");
//     $video11->setDescription("Description Video 11");
//     $video11->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video11" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
    
//     $video12 = new Video;
//     $video12->setTitle("Video 12");
//     $video12->setDescription("Description Video 12");
//     $video12->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video12" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
    
//     $video13 = new Video;
//     $video13->setTitle("Video 13");
//     $video13->setDescription("Description Video 13");
//     $video13->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video13" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
    
//     $video14 = new Video;
//     $video14->setTitle("Video 14");
//     $video14->setDescription("Description Video 14");
//     $video14->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video14" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
    
//     $video15 = new Video;
//     $video15->setTitle("Video 15");
//     $video15->setDescription("Description Video 15");
//     $video15->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video15" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
    
//     $video16 = new Video;
//     $video16->setTitle("Video 16");
//     $video16->setDescription("Description Video 16");
//     $video16->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video16" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media;');
//         $video17 = new Video;
// $video17->setTitle("Video 17");
// $video17->setDescription("Description Video 17");
// $video17->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video17" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');

// $video18 = new Video;
// $video18->setTitle("Video 18");
// $video18->setDescription("Description Video 18");
// $video18->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video18" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');

// $video19 = new Video;
// $video19->setTitle("Video 19");
// $video19->setDescription("Description Video 19");
// $video19->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video19" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');

// $video20 = new Video;
// $video20->setTitle("Video 20");
// $video20->setDescription("Description Video 20");
// $video20->setVideoLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/video20" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');

// $em = $doctrine->getManager();
// $em->persist($video1);
// $em->persist($video2);
// $em->persist($video3);
// $em->persist($video4);
// $em->persist($video5);
// $em->persist($video6);
// $em->persist($video7);
// $em->persist($video8);
// $em->persist($video9);
// $em->persist($video10);
// $em->persist($video11);
// $em->persist($video12);
// $em->persist($video13);
// $em->persist($video14);
// $em->persist($video15);
// $em->persist($video16);
// $em->persist($video17);
// $em->persist($video18);
// $em->persist($video19);
// $em->persist($video20);

// $em->flush();

    


// $em = $doctrine->getManager();
// $em->persist($video1);
// $em->persist($video2);
// $em->persist($video3);
// $em->persist($video4);


// $em->flush();



        // return $this->render('video/index.html.twig', [
        //     'controller_name' => 'VideoController',
        //     'videos' => $videos, // Passez les vidéos au modèle Twig
        
        return $this->render('video/index.html.twig', ['videos' => $repo->findAll()]);
        // ]);
    }




    #[Route('/video/create', name:'app_video_create', methods: ['GET', 'POST'])]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $video = new Video;
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($video);
            $em->flush();
            $this->addFlash('success', 'Video successfully created!');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('video/create.html.twig', ['form' => $form->createView()]);
    }

    
    #[Route("/video/{id<[0-9]+>}/edit", name:"app_video_edit", methods:["GET","POST"])]

    public function edit(Request $request, Video $video, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Video successfully edited!');
            return $this->redirectToRoute('app_home');
        }
        
        return $this->render('video/edit.html.twig', [
            'video' => $video,
            'form' => $form->createView()
        ]);
    }

    
    #[Route("/video/{id<[0-9]+>}/delete", name:"app_video_delete")]

    public function delete(Video $video, EntityManagerInterface $em): Response
    {
        $em->remove($video);
        $em->flush();
        $this->addFlash('success', 'Video successfully deleted!');
        return $this->redirectToRoute('app_home');
    }

    #[Route('/video/{id<[0-9]+>}/show', name: 'app_video_show', methods: ['GET'])]
    public function show(Video $video): Response
    {
        return $this->render('video/show.html.twig', compact('video'));
    }
}