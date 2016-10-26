<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request)
    {
        $tasks = $this->getDoctrine()->getRepository("AppBundle:Tasks")->findAll();
        $taskCounter = count($tasks);

        $comments = $this->getDoctrine()->getRepository("AppBundle:Comments")->findBy(array("active"=>true));
        $commentsCounter = count($comments);

        return $this->render('default/index.html.twig', array('taskCount'=>$taskCounter, 'tasks'=>$tasks, 'commentCount'=>$commentsCounter, 'comments'=>$comments));

        /* replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
        ]);
        */
    }

    /**
     * @Route("/admin/", name="admin")
     */
    public function adminAction()
    {
        return $this->render('admin/admin.html.twig');
    }
}
