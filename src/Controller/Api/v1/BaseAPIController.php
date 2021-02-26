<?php

namespace App\Controller\Api\v1;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BaseAPIController extends AbstractController
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

        $full_link = "https://" . $url . ".computerfreaker.cf". "/" . rawurlencode($name['url']);

        return $full_link;
    }
}
