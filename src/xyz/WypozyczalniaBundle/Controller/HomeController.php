<?php

namespace xyz\WypozyczalniaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class HomeController extends Controller {

    /**
     * Wyswietl głowna strone
     */
    public function indexAction() {
        $filmy = $this->getDoctrine()
            ->getRepository('xyzWypozyczalniaBundle:Film');
        $filmy = $filmy->findAll();
        return $this->render('xyzWypozyczalniaBundle:Home:index.html.twig', array(
            'filmy' => $filmy
        ));
    }
}
