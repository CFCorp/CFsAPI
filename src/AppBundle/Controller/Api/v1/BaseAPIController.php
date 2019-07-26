<?php

namespace AppBundle\Controller\Api\v1;

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

        $full_link = "https://" . $url . $updatedAddress. "/" . $name['url'];

        return $full_link;
    }

    public function updateImageList($subDomain){
        $curDir = "/var/www/" . $subDomain . "/";
        $ignore = Array(".", "..");

        if (is_dir($curDir)){
            if($dh = opendir($curDir)){
                while (($file = readdir($dh)) !== false){
                    if(!in_array($file, $ignore)) {
                        $em = $this->getDoctrine()->getManager();
                        $connection = $em->getConnection();
                        $statement = $connection->prepare("INSERT INTO " . $subDomain . " (url) VALUES ('$file')");
                        $statement->execute();
                    }
                }
                closedir($dh);
            }
        }

    }
}
