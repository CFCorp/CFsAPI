<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 01-May-18
 * Time: 22:35
 */
namespace App\Controller\Api\v1;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

class DVAController extends BaseAPIController
{
    /**
     * @Route("/v1/dva", name="dva")
     * @Method("GET")
     * @param $id
     */
    public function getAction() {
        $name = "dva";
        return new JsonResponse(array("url" => $this->getData($name, $name)));
    }
}