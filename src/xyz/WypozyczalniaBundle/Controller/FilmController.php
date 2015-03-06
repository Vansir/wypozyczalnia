<?php

namespace xyz\WypozyczalniaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use xyz\WypozyczalniaBundle\Entity\Recenzja;
use xyz\WypozyczalniaBundle\Form\RecenzjaType;

class FilmController extends Controller {


    /**
     * Wyświetl liste wszystkich filmów
     */
    public function wszystkieFilmyAction() {
        $repozytorium = $this->getDoctrine()->getRepository('xyzWypozyczalniaBundle:Film');
        $filmy = $repozytorium->findAll();
        return $this->render('xyzWypozyczalniaBundle:Film:lista.html.twig', array(
            'filmy' => $filmy
        ));
    }

    /**
     * Wyświetl szczegóły filmu
     *
     * @param $id integer
     */
    public function wyswietlFilmAction($id, Request $request) {
        $repozytorium = $this->getDoctrine()->getRepository('xyzWypozyczalniaBundle:Film');
        $film = $repozytorium->findOneById($id);
        if ( !$film ) {
            return $this->redirect($this->generateUrl('wypozyczalnia_homepage'));
        }

        $recenzja = new Recenzja();

        $form = $this->createForm(new RecenzjaType(), $recenzja);
        $form->handleRequest($request);

        if ( $request->isMethod('POST') && $form->isValid()) {
            $recenzja->setFilm($film);
            $recenzja->setDataUtworzenia(new \DateTime());
            $recenzja->setUzytkownik($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($recenzja);
            $em->flush();
            return $this->redirect($this->generateUrl('wypozyczalnia_film_wyswietl', array(
                'id' => $film->getId()
            )));
        }
        return $this->render('xyzWypozyczalniaBundle:Film:wyswietl.html.twig', array(
            'form' => $form->createView(),
            'film' => $film
        ));
    }


}
