<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\Reaction;
use AppBundle\Entity\Comment;



class CommentsController extends Controller
{    
  
     /**
     * @Route ("/display/comments")
     */
    public function displayComments()
    {   //comments-section.html.php
        // $user = new User();
        // $user->setName("Stancho");
        // $entityManager = $this->getDoctrine()->getManager();

        // // tells Doctrine you want to (eventually) save the Product (no queries yet)
        // $entityManager->persist($user);

        // // actually executes the queries (i.e. the INSERT query)
        // $entityManager->flush();
        $default_user = $this->fetchDefaultUser();
        
        $comments = "sql query for comments";

        //here foreach comments and check if there is reply to them 

        
        return $this->render('templates/comments-section.html.php');
    }

    public function fetchDefaultUser() {

         $is_default_user_exists = $this->getDoctrine()
        ->getRepository(User::class)
        ->findDefaultUser();

        if ($is_default_user_exists) {
            $current_user = new User($this->getDoctrine()->getRepository(User::class)->fetchDefaultUserId());
        } else {
            $this->getDoctrine()->getRepository(User::class)->createDefaultUser();
            $current_user = new User($this->getDoctrine()->getRepository(User::class)->fetchDefaultUserId());
        }

        return $current_user;

    }
}
