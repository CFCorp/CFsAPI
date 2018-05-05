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
    public function getHentaiCount(){
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT count(*) as cnt FROM `hentai`");
        $statement->execute();
        $hentaiCount = $statement->fetchAll();

        return $hentaiCount[0]['cnt'];
    }

    public function getAnimeCount(){
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT count(*) as cnt FROM `anime`");
        $statement->execute();
        $animeCount = $statement->fetchAll();

        return $animeCount[0]['cnt'];
    }


    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $hentaiCount = $this->getHentaiCount();
        $animeCount = $this->getAnimeCount();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'hentai' => $hentaiCount,
            'anime' => $animeCount
        ));
    }
}
