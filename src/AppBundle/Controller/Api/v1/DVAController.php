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

class DVAController extends BaseAPIController
{
    /**
     * @Route("/v1/dva", name="dva")
     * @Method("GET")
     * @param $id
     */
    public function getAction() {
        return new JsonResponse(array("url" => $this->getData("dva", "dva")));
    }
}