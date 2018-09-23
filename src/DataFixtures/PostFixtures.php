<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PostFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $i = 1;
        //Set test values in the table "Post" for 8 posts
        while ($i <= 8) {
            $post = new Post();
            $post->setTitle("Titre n" . $i);
            $post->setBody("Body n" . $i);
            $post->setCreated(new \DateTime());
            $post->setUpdated(new \DateTime());
            $post->setSlug("article-n" . $i);

            $manager->persist($post);
            $i++;
        }
        $manager->flush();
    }

    //Get the order of this fixture
    public function getOrder()
    {
        return 4;
    }
}