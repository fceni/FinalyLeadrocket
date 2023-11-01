<?php

namespace App\Controller;

use App\Entity\Vote;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;

class MainController extends AbstractController
{
    #[Route('/', name: 'main_home')]
    public function home(): Response
    {

        return $this->render("main/home.html.twig");
    }

    #[Route('/test', name: 'main_test')]
    public function test(): Response
    {

        return $this->render("main/test.html.twig");

    }

 


    #[Route('/main', name: 'main')]   #[Route('/add', name: 'main_add')]
    public function add(EntityManagerInterface $entityManager): Response
    {
        $vote = new Vote();
        $vote
            ->setName('Videoludique')
            ->setBackdrop('backdrop.png')
            ->setDateCreated(\DateTime());

        $entityManager->persist($vote);
        $entityManager->flush();


        return $this->render("main/add.html.twig");
    }


    #[Route('/update', name: 'main_update')]
    public function update(int $id, voteRepository $voteRepository)
    {
        $vote = $voteRepository->find($id);

        return $this->render("main/update.html.twig");
    }

//    public function index(): Response
//    {
//        $now = new \DateTime();
//        $targetDate = (new \DateTime())->modify('+1 month');
////        $interval = $targetDate->diff($now);
//
//        return $this->render('main/test.html.twig',[
//            'interval'=>$interval,
//            ]);
//    }


    #[Route('/show', name: 'main_show')]
    public function show(): Response
    {
        return $this->render("main/show.html.twig");
    }


//    #[Route("/vote", name: "vote")]
//    public function vote(Request $request, EntityManagerInterface $entityManager): JsonResponse
//    {
//        $selectedVideo = $request->get('selected_video');
//
//        if($selectedVideo){
//            $vote = $entityManager->getRepository(Vote::class)->findOneBy(['videoId' => $selectedVideo]);
//
//            if(!$vote){
//                $vote = new Vote();
//                $vote->setVideoId($selectedVideo);
//                $vote->setVoteCount(1);
//            }else {
//                $vote->setVoteCount($vote->getVoteCount() +1);
//            }
//
//            $entityManager->persist($vote);
//            $entityManager->flush();
//
//            return new JsonResponse(['message' => 'Vote enregistré avec succes']);
//        }else {
//            return new JsonResponse(['message' => 'Veuillez selectionner un vote'],400);
//        }
//
//    }
//
//
//



//    #[Route('/test', name: 'main_test')]
//    public function index(): Response
//    {
//        $now = new \DateTime();
//        $targetDate = (new \DateTime())->modify('+1 month');
//        $interval = $targetDate->diff($now);
//
//        return $this->render('main/test.html.twig', [
//            'interval'=>$interval,
//        ]);
//    }



}
