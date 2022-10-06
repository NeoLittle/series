<?php

namespace App\Controller;

use App\Entity\Serie;
use Doctrine\ORM\EntityManagerInterface;
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
    /**
     * @Route("/demo", name="demo")
     */
    public function demo(EntityManagerInterface $entityManager):Response{
        //creation d'une instance de l'entité
        $serie= new Serie();

        //hydrate toutes les propriétés
        $serie->setName('Random');
        $serie->setBackdrop('Spaaaace');
        $serie->setPoster('ppster');
        $serie->setDateCreated(new \DateTime());
        $serie->setFirstAirDate(new \DateTime("- 1 year"));
        $serie->setLastAirDate((new \DateTime('-6 month')));
        $serie->setGenres('Science-Fiction');
        $serie->setOverview('Kekchoz');
        $serie->setPopularity(100.00);
        $serie->setVote(3.2);
        $serie->setStatus('Canceled');
        $serie->setTmdbId(125);

        dump($serie);
        $entityManager-> persist($serie);
        $entityManager-> flush();


        //$entityManager = $this->getDoctrine()->getManager();

        return $this->render('series/create.html.twig');
    }
}
