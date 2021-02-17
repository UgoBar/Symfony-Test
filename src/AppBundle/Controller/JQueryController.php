<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/jquery")
 */
class JQueryController extends Controller
{
    /**
     * @Route("/", name="jquery_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('jquery/index.html.twig', [

        ]);
    }

    /**
     * @Route("/click", name="jquery_click")
     */
    public function jqueryAction(Request $request)
    {
        return $this->render('jquery/click.html.twig', [

        ]);
    }
}