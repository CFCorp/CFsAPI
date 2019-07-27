<?php

namespace AppBundle\Controller\Api\v1;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BaseAPIController extends Controller
{
    public function getData($name, $url) {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json; charset=UTF-8');
        $response->headers->set('Access-Control-Allow-Origin','*');
        $response->headers->set('Cache-Control','no-cache');
        $response->send();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT url FROM $name ORDER BY RAND() LIMIT 1");
        $statement->execute();
        $name = $statement->fetch();

        $updatedAddress = str_replace('api', '', $_SERVER["HTTP_HOST"]);

        $full_link = "https://" . $url . $updatedAddress. "/" . rawurlencode($name['url']);

        return $full_link;
    }
}
