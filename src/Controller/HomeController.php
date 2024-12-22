<?php

namespace App\Controller;

use App\Entity\Restaurant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        if ($this->isGranted('ROLE_BANNED')) {
            return $this->redirectToRoute('app_banned');
        }
        // Fetch all restaurants and their menus
        $restaurants = $entityManager->getRepository(Restaurant::class)->findAll();

        return $this->render('public/restaurants/index.html.twig', [
            'restaurants' => $restaurants,
        ]);
    }
}
