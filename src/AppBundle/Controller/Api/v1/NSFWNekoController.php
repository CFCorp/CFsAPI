<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 05-June-18
 * Time: 17:35
 */

namespace AppBundle\Controller\Api\v1;

use AppBundle\Entity\NSFWNeko;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class NSFWNekoController extends Controller
{
    /**
     * @Route("/v1/nsfwneko",name="nsfwneko")
     * @Method("GET")
     * @param $id
     */
    public function getAction() {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json; charset=UTF-8');
        $response->headers->set('Access-Control-Allow-Origin','*');
        $response->headers->set('Cache-Control','no-cache');
        $response->send();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT url FROM nsfwneko ORDER BY RAND() LIMIT 1");
        $statement->execute();
        $nsfwneko = $statement->fetch();

        $full_link = "https://nsfwneko." . $_SERVER["HTTP_HOST"]. "/" . $nsfwneko['url'];

        return new JsonResponse($full_link);
    }
}