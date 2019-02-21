<?php

namespace DemandeBundle\Controller;

use DemandeBundle\Entity\Demande;
use DemandeBundle\Form\DemandeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MissionBundle\Entity\Mission;
use Symfony\Component\HttpFoundation\Request;

class DemandeController extends Controller
{
    public function afficheAction()
    {
        $em = $this->getDoctrine()->getManager();

        $missions = $em->getRepository('MissionBundle:Mission')->findAll();

        return $this->render('@Demande/demande/affiche.html.twig', array(
            'missions' => $missions,
        ));
    }

    public function RechercheAction()
    {
        return $this->render('DemandeBundle:Demande:recherche.html.twig', array(
            // ...
        ));
    }

    public function showAction(Mission $mission)
    {

        return $this->render('@Demande/demande/show.html.twig', array(
            'mission' => $mission,
        ));
    }

    public function mesdemandesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demandes = $em->getRepository('DemandeBundle:Demande')->findAll();

        return $this->render('@Demande/demande/mesdemandes.html.twig', array(
            'demandes' => $demandes,
        ));
    }

    public function postulerAction(Request $request,Mission $mission)
    {

            $demande = new Demande();
            $form = $this->createForm(DemandeType::class, $demande);
            $form = $form->handleRequest($request);
            if ($form->isValid()) {
                $demande->setIdmission($mission);
                $em = $this->getDoctrine()->getManager();
                $em->persist($demande);
                $em->flush();
                return $this->redirectToRoute('demande_mesdemandes');
            }



        return $this->render('@Demande/demande/postuler.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function deleteAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $demande=$em->getRepository(Demande::class)->find($id);
        $em->remove($demande);
        $em->flush();
        return $this->redirectToRoute('demande_mesdemandes');

    }



}
