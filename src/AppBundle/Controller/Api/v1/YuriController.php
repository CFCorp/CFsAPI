<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 01-May-18
 * Time: 22:35
 */
namespace AppBundle\Controller\Api\v1;

use AppBundle\Entity\Yuri;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class YuriController extends Controller
{
    /**
     * @Route("/v1/yuri", name="yuri")
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
        $repo = $em->getRepository('AppBundle:Yuri');

        $yuri = $repo->createQueryBuilder('y')
            ->select('y.url')
            ->from('AppBundle:Yuri', 'y')
            ->orderBy('RAND()')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") ."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $thing = "$actual_link" . "$yuri";

        $data = $thing;

        return new JsonResponse($data);
    }
}