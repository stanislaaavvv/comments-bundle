<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\Reaction;



class CommentsController extends Controller
{
     /**
     * @Route ("/display/comments")
     */
    public function testController()
    {   //comments-section.html.php
        $user = new User();
        $user->setName("Stancho");
        $entityManager = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        
        
        return $this->render('templates/comments-section.html.php');
    }
}
