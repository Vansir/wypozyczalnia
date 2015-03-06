<?php

namespace xyz\WypozyczalniaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use xyz\WypozyczalniaBundle\Entity\Zamowienie;


class ZamowienieController extends Controller {


    /**
     * Zamów film i wyświetl informacje
     *
     * @param $id integer
     */
    public function zamowFilmAction($id) {
        if ( !$this->get('security.authorization_checker')->isGranted('ROLE_USER') ) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $repozytorium = $this->getDoctrine()->getRepository('xyzWypozyczalniaBundle:Film');
        $film = $repozytorium->findOneById($id);
        if ( !$film ) {
            return $this->redirect($this->generateUrl('wypozyczalnia_homepage'));
        }

        $zamowienie = new Zamowienie();
        $zamowienie->setFilm($film);
        $zamowienie->setUzytkownik($this->getUser());
        $zamowienie->setCena($film->getCena());
        $zamowienie->setStatus(0);
        $em = $this->getDoctrine()->getManager();
        $em->persist($zamowienie);
        $em->flush();

        return $this->render('xyzWypozyczalniaBundle:Zamowienie:zamowienie.html.twig', array(
                'zamowienie' => $zamowienie)
        );
    }

    /**
     * Wyświetl wszystkie zamówienia
     */
    public function wszystkieZamowieniaAction() {

        $uzytkownik = $this->getUser();
        return $this->render('xyzWypozyczalniaBundle:Zamowienie:zamowienia.html.twig', array(
                'uzytkownik' => $uzytkownik
        ));
    }
}
