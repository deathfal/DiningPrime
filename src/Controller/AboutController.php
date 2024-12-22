<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'app_about')]
    public function index(): Response
    {

        if ($this->isGranted('ROLE_BANNED')) {
            return $this->redirectToRoute('app_banned');
        }

        return $this->render('about/index.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }
}
