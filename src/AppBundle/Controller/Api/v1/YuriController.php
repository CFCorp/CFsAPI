<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 01-May-18
 * Time: 22:35
 */
namespace AppBundle\Controller\Api\v1;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

class YuriController extends BaseAPIController
{
    /**
     * @Route("/v1/yuri", name="yuri")
     * @Method("GET")
     * @param $id
     */
    public function getAction() {
        $this->updateImageList("yuri");
        return new JsonResponse(array("url" => $this->getData("yuri", "yuri")));
    }
}