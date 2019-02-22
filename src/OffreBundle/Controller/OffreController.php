<?php

namespace OffreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OffreController extends Controller
{
    public function afficheAction()
    {
        return $this->render('OffreBundle:Offre:affiche.html.twig', array(
            // ...
        ));
    }

    public function showAction()
    {
        return $this->render('OffreBundle:Offre:show.html.twig', array(
            // ...
        ));
    }

    public function mesprojetsAction()
    {
        return $this->render('OffreBundle:Offre:mesprojets.html.twig', array(
            // ...
        ));
    }

    public function postulerAction()
    {
        return $this->render('OffreBundle:Offre:postuler.html.twig', array(
            // ...
        ));
    }

    public function deleteAction()
    {
        return $this->render('OffreBundle:Offre:delete.html.twig', array(
            // ...
        ));
    }

}
