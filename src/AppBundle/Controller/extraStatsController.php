<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class extraStatsController extends Controller
{
    /**
     * @Route("/stats", name="stats")
     */
    public function indexAction()
    {
        return $this->render('default/stats.html.twig', null);
    }
}
