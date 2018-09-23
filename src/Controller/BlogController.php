<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    /**
     * @Route("/blog", name="blog")
     */
    public function blog()
    {
        return $this->render('Content/blog.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

}