<?php

namespace AppBundle\Controller\Api\v1;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{

    public function categoryNameUrl($name, Request $request){
        $full_url = $request->getHost().$this->generateUrl("$name");
        return $full_url;
    }

    /**
     * @Route("/v1/categories", name="categories")
     * @Method("GET")
     * @param $id
     */
    public function getAction(Request $request)
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json; charset=UTF-8');
        $response->headers->set('Access-Control-Allow-Origin','*');
        $response->headers->set('Cache-Control','no-cache');
        $response->send();

        return new JsonResponse(array(
            "anime" => $this->categoryNameUrl("anime", $request),
            "baguette" => $this->categoryNameUrl("baguette", $request),
            "dva" => $this->categoryNameUrl("dva", $request),
            "hentai" => $this->categoryNameUrl("hentai", $request),
            "hug" => $this->categoryNameUrl("hug", $request),
            "trap" => $this->categoryNameUrl("trap", $request),
            "nsfwneko" => $this->categoryNameUrl("nsfwneko", $request),
            "neko" => $this->categoryNameUrl("neko", $request),
            "yuri" => $this->categoryNameUrl("yuri", $request)));
    }
}