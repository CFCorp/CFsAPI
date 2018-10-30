<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 01-May-18
 * Time: 22:35
 */
namespace AppBundle\Controller\Api\v1;

use AppBundle\Entity\DVA;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DVAController extends Controller
{
    /**
     * @Route("/v1/dva", name="dva")
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
        $repo = $em->getRepository('AppBundle:DVA');

        $dva = $repo->createQueryBuilder('d')
            ->select('d.url')
            ->from('AppBundle:DVA', 'b')
            ->orderBy('RAND()')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        $data = $dva;

        return new JsonResponse($data);
    }
}