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
        $repo = $em->getRepository('AppBundle:NSFWNeko');

        $nsfwneko = $repo->createQueryBuilder('nn')
            ->select('nn.url')
            ->from('AppBundle:NSFWNeko', 'nn')
            ->orderBy('RAND()')
            ->setMaxResults(1)
            ->getQuery();

        $data = $nsfwneko;

        return new JsonResponse($data);
    }
}