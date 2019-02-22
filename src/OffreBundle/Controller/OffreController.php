<?php

namespace OffreBundle\Controller;

use OffreBundle\Entity\Offre;
use OffreBundle\Form\OffreType;
use ProjetBundle\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OffreController extends Controller
{
    public function afficheAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projets = $em->getRepository('ProjetBundle:Projet')->findAll();

        return $this->render('@Offre/offre/affiche.html.twig', array(
            'projets' => $projets,
        ));
    }

    public function showAction(Projet $projet)
    {

        return $this->render('@Offre/offre/show.html.twig', array(
            'projet' => $projet,
        ));
    }

    public function mesoffresAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offres = $em->getRepository('OffreBundle:Offre')->findAll();

        return $this->render('@Offre/Offre/mesoffres.html.twig', array(
            'offres' => $offres,
        ));
    }

    public function postulerAction(Request $request, Projet $projet)
    {
        $offre = new Offre();
        $form = $this->createForm(OffreType::class,$offre);
        $form = $form->handleRequest($request);
        if ($form->isValid()) {
            $offre->setIdprojet($projet);
            $em = $this->getDoctrine()->getManager();
            $em->persist($offre);
            $em->flush();
            return $this->redirectToRoute('offre_mesoffres');
        }

        return $this->render('@Offre/offre/postuler.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $offre=$em->getRepository(Offre::class)->find($id);
        $em->remove($offre);
        $em->flush();
        return $this->redirectToRoute('offre_mesoffres');
    }

    public function updateAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $offre=$em->getRepository(Offre::class)->find($id);
        $form=$this->createForm(OffreType::class,$offre);

        $form=$form->handleRequest($request);
        if ($form->isValid())
        {
            $em->flush();
            return $this->redirectToRoute('offre_mesoffres');
        }

        return $this->render('@Offre/offre/update.html.twig', array(
            'form'=>$form->createView(),

        ));
    }

}
