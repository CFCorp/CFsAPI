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

class HentaiController extends BaseAPIController
{
    /**
     * @Route("/v1/hentai",name="hentai")
     * @Method("GET")
     * @param $id
     */
    public function getAction() {
        return new JsonResponse($this->getData("hentai", "hentai"));
    }
}