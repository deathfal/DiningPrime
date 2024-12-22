<?php

namespace App\Controller;

use App\Entity\Restaurant; // <-- Ensure this is imported
use App\Entity\Menu;       // <-- Import the Menu entity as well
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $restaurants = $entityManager->getRepository(Restaurant::class)->findAll();

        return $this->render('public/restaurants/index.html.twig', [
            'restaurants' => $restaurants,
        ]);
    }
    #[Route('/menu/{id}', name: 'app_menu_show', methods: ['GET'])]
    public function showMenu(Menu $menu): Response
    {
        return $this->render('menu/show.html.twig', [
            'menu' => $menu,
        ]);
    }

    #[Route('/restaurant/{id}', name: 'app_public_restaurant_show', methods: ['GET'])]
    public function show(Restaurant $restaurant): Response
    {
        return $this->render('public/restaurants/restaurant_details.html.twig', [
            'restaurant' => $restaurant,
        ]);
    }


    // #[Route('/restaurant/{id}/menu', name: 'app_public_restaurant_menu', methods: ['GET'])]
    // public function showCarte(Restaurant $restaurant): Response
    // {
    //     return $this->render('public/restaurants/menu.html.twig', [
    //         'restaurant' => $restaurant,
    //     ]);
    // }



}
