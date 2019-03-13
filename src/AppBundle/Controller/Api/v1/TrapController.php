<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 01-May-18
 * Time: 22:35
 */
namespace AppBundle\Controller\Api\v1;

use AppBundle\Entity\Trap;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TrapController extends BaseAPIController
{
    /**
     * @Route("/v1/trap", name="trap")
     * @Method("GET")
     * @param $id
     */
    public function getAction() {
        return new JsonResponse($this->getData("trap", "trap"));
    }
}