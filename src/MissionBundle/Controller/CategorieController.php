<?php

namespace MissionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorieController extends Controller
{
    public function ajoutAction()
    {
        return $this->render('MissionBundle:Categorie:ajout.html.twig', array(
            // ...
        ));
    }

    public function deleteAction()
    {
        return $this->render('MissionBundle:Categorie:delete.html.twig', array(
            // ...
        ));
    }

    public function updateAction()
    {
        return $this->render('MissionBundle:Categorie:update.html.twig', array(
            // ...
        ));
    }

    public function showAction()
    {
        return $this->render('@Mission/Categorie/show.html.twig', array(
            // ...
        ));
    }

}
