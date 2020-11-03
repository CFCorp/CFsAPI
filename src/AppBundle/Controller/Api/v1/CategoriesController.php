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
        $full_url =  'https' . '://' . "api.computerfreaker.cf".$this->generateUrl("$name");
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

        $names = array("anime", "baguette", "dva", "hentai", "hug", "trap", "nsfwneko", "neko", "yuri");
        foreach ($names as $key => $name){
             $data[] = $this->categoryNameUrl($name, $request);

        }
        $combined_vals = array_combine($names, $data);

        return new JsonResponse($combined_vals);

    }
}