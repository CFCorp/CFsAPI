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

class YuriController extends BaseAPIController
{
    /**
     * @Route("/v1/yuri", name="yuri")
     * @Method("GET")
     * @param $id
     */
    public function getAction() {
        return new JsonResponse(array("url" => $this->getData("yuri", "yuri")));
    }
}