<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 05-June-18
 * Time: 17:35
 */

namespace AppBundle\Controller\Api\v1;

use AppBundle\Entity\Neko;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class NekoController extends BaseAPIController
{
    /**
     * @Route("/v1/neko",name="neko")
     * @Method("GET")
     * @param $id
     */
    public function getAction() {
        return new JsonResponse(array("url" => $this->getData("neko", "neko")));
    }
}