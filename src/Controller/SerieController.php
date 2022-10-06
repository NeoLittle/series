<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/series", name="serie_"
 */

class SerieController extends AbstractController
{

    /**
     * @Route("", name="list")
     */
    public function index(): Response
    {
        //todo: aller chercher les séries en BDD

        return $this->render('serie/list.html.twig', [
            'controller_name' => 'SerieController',
        ]);
    }

    /**
     * @Route("/details:{id}", name="detail")
     */
    public function details(int $id):Response{


        return $this->render('series/detail.html.twig');
    }


    /**
     * @Route("/create", name="create")
     */
    public function create():Response{

        return $this->render('series/create.html.twig');

    }
}
