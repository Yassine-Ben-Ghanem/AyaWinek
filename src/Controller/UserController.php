<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     *  @IsGranted("ROLE_ADMIN")
     */
    public function index(UserRepository $userRepository): Response
    {
       

        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }
}
