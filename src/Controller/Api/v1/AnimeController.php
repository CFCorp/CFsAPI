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
use Symfony\Component\HttpFoundation\Request;


class AnimeController extends BaseAPIController
{

    /**
     * @Route("/v1/anime", name="anime")
     * @Method("GET")
     * @param $id
     */
    public function getAction(Request $request) {
        $name = "anime";
        return new JsonResponse(array("url" => $this->getData($name, $name)));
    }


}