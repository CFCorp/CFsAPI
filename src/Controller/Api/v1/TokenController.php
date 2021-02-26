<?php

namespace App\Controller\Api\v1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TokenController extends AbstractController
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

    public function generateNewUserToken(){
        $user = $this->getUser();


        $password = $user->getPassword();

        $time = getdate();
        $hashed = $user->getUsername() . $password . $time[0] . $time['weekday'];

        $token = sha1($hashed . microtime(false));

        $user->setUserToken($token);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirect('token');
    }

    /**
     * @Route("/token", name="token")
     */
    public function indexAction(Request $request)
    {
        if($request->getMethod() == 'POST'){
            $this->generateNewUserToken();
        }
        $userToken = $this->getUserToken();
        return $this->render('token/token.html.twig', array('userToken' => $userToken));
    }
}
