<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="main_page")
     */
    public function index()
    {
        return $this->render('front/index.html.twig');
    }

    /**
     * @Route("/video-list/category/{categoryname}, {id}", name="video_list")
     */
    public function videoList()
    {
        return $this->render('front/video_list.html.twig');
    }

    /**
     * @Route("/video-details", name="video_details")
     */
    public function videoDetails()
    {
        return $this->render('front/video_details.html.twig');
    }

    /**
      * @Route("/search_results", name="search_results", methods={"POST"})
     */
    public function searchResults()
    {
        return $this->render('front/search_results.html.twig');
    }

    /**
      * @Route("/pricing", name="pricing")
     */
    public function pricing()
    {
        return $this->render('front/pricing.html.twig');
    }

    /**
      * @Route("/register", name="register")
     */
    public function register()
    {
        return $this->render('front/register.html.twig');
    }

    /**
      * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render('front/login.html.twig');
    }

    /**
      * @Route("/payment", name="payment")
     */
    public function payment()
    {
        return $this->render('front/payment.html.twig');
    }

    /**
      * @Route("/payment", name="payment")
     */
    public function mainCategories()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findBy(['parent' => null], ['name' => 'ASC']);
        return $this->render('front/_main_categories.html.twig', compact('categories'));
    }
}
