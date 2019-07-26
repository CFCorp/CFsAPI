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

class NSFWNekoController extends BaseAPIController
{
    /**
     * @Route("/v1/nsfwneko",name="nsfwneko")
     * @Method("GET")
     * @param $id
     */
    public function getAction() {
        $this->updateImageList("nsfwneko");
        return new JsonResponse(array("url" => $this->getData("nsfwneko", "nsfwneko")));
    }
}