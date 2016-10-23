<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity;

class ProfileController extends Controller
{
    /**
     * @Route("/profile")
     * @Route("/profile/settings", name="myProfile")
     */
    public function myProfileAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        } else {
            $user = $this->getUser();
            $userId = $user->getId();

            $repoU = $this->getDoctrine()->getRepository("AppBundle:User");
            $queryUser = $repoU->createQueryBuilder('U');
            $queryUser->where('U.id = :id');
            $queryUser->setParameter('id', $userId);

            $userInfo = $queryUser->getQuery()->getResult();

            return $this->render('profile/myProfile.html.twig', array('userInfo' => $userInfo));
        }
    }

    /**
     * @Route("profile/settings/edit", name="editProfile")
     */
    public function editProfileAction()
    {

    }

    /**
     * @Route("profile/tasks", name="myTasks")
     */
    public function myTasksAction()
    {
        $user = $this->getUser();
        $userId = $user->getId();

        $repoT = $this->getDoctrine()->getRepository("AppBundle:Tasks");
        $queryTask = $repoT->createQueryBuilder('T');
        $queryTask->where('T.users = :id');
        $queryTask->setParameter('id', $userId);

        $taskInfo = $queryTask->getQuery()->getResult();

        return $this->render("profile/myTasks.html.twig", array('tasks'=>$taskInfo));
    }

    /**
     * @Route("profile/comments", name="myComments")
     */
    public function myCommentsAction()
    {
        return $this->render("profile/myComments.html.twig");
    }
}
