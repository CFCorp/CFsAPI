<?php

namespace AppBundle\Controller\Api\v1;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class TokenController extends Controller
{
    public function getUserToken(){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');



        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $username = $user->getUsername();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT `user_token` as tkn FROM `app_users` WHERE `username` = \"$username\"");
        $statement->execute();
        $userToken = $statement->fetchAll();

        return $userToken[0]['tkn'];
    }
    /**
     * @Route("/token", name="token")
     */
    public function indexAction()
    {
        $userToken = $this->getUserToken();
        return $this->render('token/token.html.twig', array('userToken' => $userToken));
    }
}
