<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 01-May-18
 * Time: 22:35
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class DefaultController extends AbstractController
{

    public function getCount($name){
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT count(*) as cnt FROM `$name`");
        $statement->execute();
        $getCount = $statement->fetchAll();

        return $getCount[0]['cnt'];
    }
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Environment $twigEnvironment)
    {
        $names = array("anime", "baguette", "dva", "hentai", "hug", "trap", "nsfwneko", "neko", "yuri");
        foreach ($names as $key => $name){
            $data[] = $this->getCount($name);

        }
        $combined_array = array_combine($names, $data);

        return $this->render('default/index.html.twig', $combined_array);
    }
}
