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
        $repoT = $this->getDoctrine()->getRepository("AppBundle:Tasks");
        $qTC = $repoT->createQueryBuilder('T');
        $qTC->select('COUNT(T)');
        $qTC->where('T.taskCheck = :check');
        $qTC->setParameter('check', 0);

        $taskCounter = $qTC->getQuery()->getSingleScalarResult();

        $tasks = $repoT->findAll();

        $repoC = $this->getDoctrine()->getRepository("AppBundle:Comments");
        $qCC = $repoC->createQueryBuilder('C');
        $qCC->select('COUNT(C)');
        $qCC->where('C.active = :check');
        $qCC->setParameter('check', 0);

        $commentCounter = $qCC->getQuery()->getSingleScalarResult();

        $comments = $repoC->findAll();

        return $this->render('default/index.html.twig', array('taskCount'=>$taskCounter, 'tasks'=>$tasks, 'commentCount'=>$commentCounter, 'comments'=>$comments));

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
