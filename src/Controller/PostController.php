<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{
    /**
     * @Route("/game", name="blog")
     */
    public function postGame()
    {
        return $this->render('Content/game.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @Route("/team", name="blog")
     */
    public function postTeam()
    {
        return $this->render('Content/team.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @Route("/allPost", name="allPost")
     */
    public function allPost(PostRepository $postRepository)
    {
        $post = $postRepository->findAll();

        return $this->render('Content/allPost.html.twig', [
            'posts' => $post
        ]);
    }

    /**
     * @Route("/blog/{blog_slug}", name="blog_name")
     */
    public function gameSheet(PostRepository $postRepository, $blog_slug)
    {
        $blog = $postRepository->findOneBy(array('slug' => $blog_slug));

        if (!$blog instanceof Post) {
            throw $this->createNotFoundException('');
        }

        return $this->render('Content/blog.html.twig', [
            'blog' => $blog,
        ]);
    }
}