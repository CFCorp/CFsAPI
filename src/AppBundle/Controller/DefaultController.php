<?php
/**
 * Created by computerfreaker.
 * User: computerfreaker
 * Date: 01-May-18
 * Time: 22:35
 */
namespace AppBundle\Controller;

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
        $hentaiCount = $this->getCount("hentai");
        $animeCount = $this->getCount("anime");
        $dvaCount = $this->getCount("dva");
        $trapCount = $this->getCount("trap");
        $hugCount = $this->getCount("hug");
        $baguetteCount = $this->getCount("baguette");
        $yuriCount = $this->getCount("yuri");
        $nekoCount = $this->getCount("neko");
        $nsfwnekoCount = $this->getCount("nsfwneko");
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'hentai' => $hentaiCount,
            'anime' => $animeCount,
            'dva' => $dvaCount,
            'trap' => $trapCount,
            'hug' => $hugCount,
            'baguette' => $baguetteCount,
            'yuri' => $yuriCount,
            'neko' => $nekoCount,
            'nsfwneko' => $nsfwnekoCount
        ));
    }
}
