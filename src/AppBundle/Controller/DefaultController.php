<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 01-May-18
 * Time: 22:35
 */
namespace AppBundle\Controller;

use AppBundle\Controller\Api\EndPointsEnums;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
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
    public function indexAction(Request $request)
    {
        $names = array("anime", "baguette", "dva", "hentai", "hug", "trap", "nsfwneko", "neko", "yuri");
        foreach ($names as $key => $name){
            $data[] = $this->getCount($name);

        }
        $combined_array = array_combine($names, $data);
        
        return $this->render('default/index.html.twig', $combined_array);
    }
}
