<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 01-May-18
 * Time: 22:35
 */

namespace AppBundle\Controller\Api\v1;

use AppBundle\Entity\Hentai;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HentaiController extends Controller
{
    /**
     * @Route("/v1/hentai",name="hentai")
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
        $repo = $em->getRepository('AppBundle:Hentai');

        $hentai = $repo->createQueryBuilder('h')
            ->select('h.url')
            ->from('AppBundle:Hentai', 'h')
            ->orderBy('RAND()')
            ->setMaxResults(1)
            ->getQuery();

        $data = $hentai;

        return new JsonResponse($data);
    }
}