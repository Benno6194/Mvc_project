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
}
