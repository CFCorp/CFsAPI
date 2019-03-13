<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 05-June-18
 * Time: 17:35
 */

namespace AppBundle\Controller\Api\v1;

use AppBundle\Entity\Hug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HugController extends BaseAPIController
{
    /**
     * @Route("/v1/hug",name="hug")
     * @Method("GET")
     * @param $id
     */
    public function getAction() {
        return new JsonResponse(array("url" => $this->getData("hug", "hug")));
    }
}