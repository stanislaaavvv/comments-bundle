<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;
use AppBundle\Entity\Reaction;
use AppBundle\Entity\Comment;



class CommentController extends Controller
{    
  
     /**
     * @Route ("/comments")
     * @Template(engine="php")
     */
    public function displayComments()
    {   
        $comments_ids  = $this->fetchAllComments();
        $comments_html = $this->processComments($comments_ids);
                
        return $this->render('templates/comments-section.html.php',array("comments" => $comments_html));
    }

     /**
     * @Route ("/comments/reload/{offset}", options={"expose"=true},name = "route_reload")
     * @Template(engine="php")
     */
    public function reloadComments($offset = 5) {

        //return $this->fetchAllComments();
        $comments_ids  = $this->fetchAllComments($offset);
        $comments_html = $this->processComments($comments_ids);

        return new Response($comments_html);
    }

    public function fetchDefaultUser() {

         $is_default_user_exists = $this->getDoctrine()
        ->getRepository(User::class)
        ->findDefaultUser();

        if ($is_default_user_exists) {
            $default_user_id = $this->getDoctrine()->getRepository(User::class)->fetchDefaultUserId(); 
            $current_user    = $this->getDoctrine()->getRepository(User::class)->find($default_user_id);
        } else {
            $this->getDoctrine()->getRepository(User::class)->createDefaultUser();
            $current_user = new User($this->getDoctrine()->getRepository(User::class)->fetchDefaultUserId());
        }

        return $current_user;

    }

    public function fetchAllComments($offset = 5) {

        return $this->getDoctrine()->getRepository(Comment::class)->fetchActiveComments($offset);

    }

    /**
    * @Template(engine="php")
    */
    public function processComments($set_of_comments) {

        $default_user       = $this->fetchDefaultUser();
        $default_user_id    = $default_user->getId();
        $default_user_name  = $default_user->getName();
        $comments_html      = "";

        foreach ($set_of_comments as $comment) {

            $current_comment = $this->getDoctrine()->getRepository(Comment::class)->find($comment['id']);
            $replies_html    = "";

            //check if there is reply or no
            
            if ($this->getDoctrine()->getRepository(Comment::class)->hasReplyComments($current_comment->getId())) {
                $reply_comments = $this->getDoctrine()->getRepository(Comment::class)->fetchReplyToComments($current_comment->getId());

                foreach ($reply_comments as $reply_comment) {

                    if ($reply_comment->getCreatorId() == $default_user_id) {

                        $class_for_delete = $class_for_edit   = "";
                        $creator_name     = $default_user_name;

                    } else {

                        $class_for_delete = $class_for_edit   =  "hidden";
                        $tmp_user         = $this->getDoctrine()->getRepository(User::class)->find($reply_comment->getCreatorId());
                        $creator_name     = $tmp_user->getName();
                    }

                    if($this->getDoctrine()->getRepository(Comment::class)->commentIsLiked($default_user_id,$reply_comment->getId())) {
                        $class_for_reaction = "liked";
                    } else {
                        $class_for_reaction = "";
                    }

                    $replies_html .= $this->render('templates/reply-layout.html.php',array("comment_id" => $reply_comment->getId(),"id_to_reply" => $reply_comment->getReplyToId(),"comment_body" => $reply_comment->getContent(),"created" => $reply_comment->getCreated()->format('Y-m-d H:i:s'),"creator_name" => $creator_name,"class_for_edit" => $class_for_edit,"class_for_delete" => $class_for_delete,"class_for_reaction" => $class_for_reaction))->getContent();
                }

            }


            if ($current_comment->getCreatorId() == $default_user_id) {

                $class_for_delete = $class_for_edit   = "";
                $creator_name     = $default_user_name;

            } else {

                $class_for_delete = $class_for_edit   =  "hidden";
                $tmp_user         = $this->getDoctrine()->getRepository(User::class)->find($current_comment->getCreatorId());
                $creator_name     = $tmp_user->getName();
            }

            if($this->getDoctrine()->getRepository(Comment::class)->commentIsLiked($default_user_id,$current_comment->getId())) {
                $class_for_reaction = "liked";
            } else {
                $class_for_reaction = "";
            }

            $comments_html .= $this->render('templates/comment-layout.html.php',array("comment_id" => $current_comment->getId(),"comment_body" => $current_comment->getContent(),"created" => $current_comment->getCreated()->format('Y-m-d H:i:s'),"creator_name" => $creator_name,"class_for_edit" => $class_for_edit,"class_for_delete" => $class_for_delete,"replies" => $replies_html,"class_for_reaction" => $class_for_reaction))->getContent(); 

            $replies_html   = '';
        }

        return $comments_html;
    }

    /**
     * @Route ("/add/comment/{content}", options={"expose"=true},name = "route_add")
     */
    public function addComment($content) {

        $entityManager = $this->getDoctrine()->getManager();
        $default_user  = $this->fetchDefaultUser(); 
        $comment       = new Comment();
        $response      = 0;

        try {

            $comment->setContent($content);
            $comment->setCreatorId($default_user->getId());
            $comment->setIsActive(1);
            $comment->setCreated(new \DateTime());
            $comment->setIsUpdated(0);
            $comment->setUpdated(new \DateTime());
            $comment->setReplyToId(-1);

            $entityManager->persist($comment);
            $entityManager->flush();
            $response = 1;
        } catch (Exception $e) {
            $response = 0;
        }
       

        return new Response($response);
    }

    /**
     * @Route ("/reply/{content}/{reply_to_id}", options={"expose"=true},name = "route_reply")
     */
    public function addReply($content,$reply_to_id) {

        $entityManager = $this->getDoctrine()->getManager();
        $default_user  = $this->fetchDefaultUser(); 
        $comment       = new Comment();
        $response      = 0;

        try {

            $comment->setContent($content);
            $comment->setCreatorId($default_user->getId());
            $comment->setIsActive(1);
            $comment->setCreated(new \DateTime());
            $comment->setIsUpdated(0);
            $comment->setUpdated(new \DateTime());
            $comment->setReplyToId($reply_to_id);

            $entityManager->persist($comment);
            $entityManager->flush();
            $response = 1;

        } catch (Exception $e) {
            $response = 0;
        }
       
        return new Response($response);

    }
     /**
     * @Route ("/edit/comment/{comment_id}/{content}", options={"expose"=true},name = "route_edit"))
     */
    public function editComment($comment_id,$content) {

        $entityManager = $this->getDoctrine()->getManager();
        $comment       = $this->getDoctrine()->getRepository(Comment::class)->find($comment_id);
        $response      = 0;

        try {

            $comment->setContent($content);
            $comment->setIsUpdated(1);
            $comment->setUpdated(new \DateTime());
           
            $entityManager->persist($comment);
            $entityManager->flush();
            $response = 1;

        } catch (Exception $e) {
            $response      = 0;
        } 
        
        return new Response($response);
    }
    /**
     * @Route ("/delete/comment/{comment_id}", options={"expose"=true},name = "route_delete")
     */
    public function deleteComment($comment_id) {

        $entityManager = $this->getDoctrine()->getManager();
        $comment       = $this->getDoctrine()->getRepository(Comment::class)->find($comment_id);
        $response      = 0;

        try {

            $comment->setIsActive(0);

            $entityManager->persist($comment);
            $entityManager->flush();
            $response = 1;

        } catch (Exception $e) {
            $response      = 0;
        }

        return new Response($response);
       
    }
    /**
     * @Route ("/add/reaction/{comment_id}", options={"expose"=true},name = "route_reaction"))
     */
    public function addReaction($comment_id,$type = "like") {

        $entityManager = $this->getDoctrine()->getManager();
        $reaction      = new Reaction();
        $response      = 0;
        $user          = $this->fetchDefaultUser();
        $user_id       = $user->getId();
        try {
            $reaction->setType($type);
            $reaction->setUserId($user_id);
            $reaction->setCommentId($comment_id);

            $entityManager->persist($reaction);
            $entityManager->flush();
            $response = 1;

        } catch (Exception $e) {
            $response = 0;
        }

        return new Response($response);
       
    }

}
