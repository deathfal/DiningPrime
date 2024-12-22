<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Menu;
use App\Entity\Dish;
use App\Entity\Dessert;

class MenuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Create the Lunch Menu
        $lunchMenu = new Menu();
        $lunchMenu->setTitle('Lunch Menu');
        $lunchMenu->setDescription('A variety of lunch specials.');
        $lunchMenu->setPrice(19.99);
        $manager->persist($lunchMenu);

        // Create the Dinner Menu
        $dinnerMenu = new Menu();
        $dinnerMenu->setTitle('Dinner Menu');
        $dinnerMenu->setPrice(29.99);
        $dinnerMenu->setDescription('Delicious evening dishes.');
        $manager->persist($dinnerMenu);

        // Create Dishes and associate them with menus
        $this->createDishes($manager, $lunchMenu, $dinnerMenu);

        // Create Desserts and associate them with menus
        $this->createDesserts($manager, $lunchMenu, $dinnerMenu);

        $manager->flush();
    }


    private function createDishes(ObjectManager $manager, Menu $lunchMenu, Menu $dinnerMenu): void
    {
        $dish1 = new Dish();
        $dish1->setName('Spaghetti Carbonara');
        $dish1->setPrice(12.99);
        $dish1->setDescription('Spaghetti with bacon, eggs, and cheese.');
        $dish1->setMenu($lunchMenu);
        $manager->persist($dish1);

        $dish2 = new Dish();
        $dish2->setName('Grilled Chicken');
        $dish2->setPrice(15.50);
        $dish2->setDescription('Grilled chicken with a side of vegetables.');
        $dish2->setMenu($dinnerMenu);
        $manager->persist($dish2);

        $dish3 = new Dish();
        $dish3->setName('Vegetable Stir Fry');
        $dish3->setPrice(10.99);
        $dish3->setDescription('Fresh vegetables stir-fried with tofu.');
        $dish3->setMenu($lunchMenu);
        $manager->persist($dish3);

        $dish4 = new Dish();
        $dish4->setName('Beef Stroganoff');
        $dish4->setPrice(18.00);
        $dish4->setDescription('Beef in a creamy mushroom sauce over noodles.');
        $dish4->setMenu($dinnerMenu);
        $manager->persist($dish4);
    }

    private function createDesserts(ObjectManager $manager, Menu $lunchMenu, Menu $dinnerMenu): void
    {
        $dessert1 = new Dessert();
        $dessert1->setName('Chocolate Cake');
        $dessert1->setPrice(5.99);
        $dessert1->setDescription('Rich chocolate cake with fudge frosting.');
        $dessert1->setMenu($lunchMenu);
        $manager->persist($dessert1);

        $dessert2 = new Dessert();
        $dessert2->setName('Apple Pie');
        $dessert2->setPrice(4.99);
        $dessert2->setDescription('Warm apple pie with vanilla ice cream.');
        $dessert2->setMenu($dinnerMenu);
        $manager->persist($dessert2);

        $dessert3 = new Dessert();
        $dessert3->setName('Ice Cream Sundae');
        $dessert3->setPrice(6.50);
        $dessert3->setDescription('Vanilla ice cream with chocolate syrup and nuts.');
        $dessert3->setMenu($lunchMenu);
        $manager->persist($dessert3);

        $dessert4 = new Dessert();
        $dessert4->setName('Tiramisu');
        $dessert4->setPrice(7.00);
        $dessert4->setDescription('Italian dessert made with coffee-soaked ladyfingers and mascarpone.');
        $dessert4->setMenu($dinnerMenu);
        $manager->persist($dessert4);
    }
}
