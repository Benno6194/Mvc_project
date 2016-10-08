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
        $repo = $this->getDoctrine()->getRepository("AppBundle:Tasks");
        $qTC = $repo->createQueryBuilder('T');
        $qTC->select('COUNT(T)');
        $qTC->where('T.taskCheck = :check');
        $qTC->setParameter('check', 0);

        $taskCounter = $qTC->getQuery()->getSingleScalarResult();

        $tasks = $repo->findAll();
        return $this->render('default/index.html.twig', array('taskCount'=>$taskCounter, 'tasks'=>$tasks));

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
