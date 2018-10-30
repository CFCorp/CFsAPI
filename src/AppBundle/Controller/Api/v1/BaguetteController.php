<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 05-June-18
 * Time: 18:04
 */

namespace AppBundle\Controller\Api\v1;

use AppBundle\Entity\Baguette;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BaguetteController extends Controller
{
    /**
     * @Route("/v1/baguette",name="baguette")
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
        $repo = $em->getRepository('AppBundle:Baguette');

        $baguette = $repo->createQueryBuilder('b')
            ->select('b.url')
            ->from('AppBundle:Baguette', 'b')
            ->orderBy('RAND()')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") ."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $thing = "$actual_link" . "$baguette";

        $data = $thing;

        return new JsonResponse($data);
    }
}