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
        $userInfo = $this->getUser();
        return $this->render('profile/myProfile.html.twig', array('userInfo' => $userInfo));
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
        $taskInfo = $this->getUser()->getTasks();
        return $this->render("profile/myTasks.html.twig", array('tasks'=>$taskInfo));
    }

    /**
     * @Route("profile/tasks/create", name="createTask")
     */
    public function createTaskAction()
    {

    }

    /**
     * @Route("profile/comments", name="myComments")
     */
    public function myCommentsAction()
    {
        return $this->render("profile/myComments.html.twig");
    }
}
