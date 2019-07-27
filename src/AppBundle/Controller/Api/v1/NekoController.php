<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 05-June-18
 * Time: 17:35
 */

namespace AppBundle\Controller\Api\v1;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

class NekoController extends BaseAPIController
{
    /**
     * @Route("/v1/neko",name="neko")
     * @Method("GET")
     * @param $id
     */
    public function getAction() {
        $name = "neko";
        return new JsonResponse(array("url" => $this->getData($name, $name)));
    }
}