<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 05-June-18
 * Time: 18:04
 */

namespace AppBundle\Controller\Api\v1;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaguetteController extends BaseAPIController
{
    /**
     * @Route("/v1/baguette",name="baguette")
     * @Method("GET")
     * @param $id
     */
    public function getAction() {
        $name = "baguette";
        return new JsonResponse(array("url" => $this->getData($name, $name)));
    }
}