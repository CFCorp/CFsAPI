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

    public function getDVACount(){
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT count(*) as cnt FROM `dva`");
        $statement->execute();
        $dvaCount = $statement->fetchAll();

        return $dvaCount[0]['cnt'];
    }

    public function getTrapCount(){
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT count(*) as cnt FROM `trap`");
        $statement->execute();
        $trapCount = $statement->fetchAll();

        return $trapCount[0]['cnt'];
    }

    public function getHugCount(){
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT count(*) as cnt FROM `hug`");
        $statement->execute();
        $hugCount = $statement->fetchAll();

        return $hugCount[0]['cnt'];
    }

    public function getBaguetteCount(){
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT count(*) as cnt FROM `baguette`");
        $statement->execute();
        $baguetteCount = $statement->fetchAll();

        return $baguetteCount[0]['cnt'];
    }


    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $hentaiCount = $this->getHentaiCount();
        $animeCount = $this->getAnimeCount();
        $dvaCount = $this->getDVACount();
        $trapCount = $this->getTrapCount();
        $hugCount = $this->getHugCount();
        $baguetteCount = $this->getBaguetteCount();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'hentai' => $hentaiCount,
            'anime' => $animeCount,
            'dva' => $dvaCount,
            'trap' => $trapCount,
            'hug' => $hugCount,
            'baguette' => $baguetteCount
        ));
    }
}
