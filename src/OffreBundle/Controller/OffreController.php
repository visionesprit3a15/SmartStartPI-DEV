<?php

namespace OffreBundle\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use OffreBundle\Entity\Offre;
use OffreBundle\Form\OffreType;
use ProjetBundle\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OffreController extends Controller
{
    public function afficheAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $em = $this->getDoctrine()->getManager();

        $projets = $em->getRepository('ProjetBundle:Projet')->findAll();

        return $this->render('@Offre/offre/affiche.html.twig', array(
            'projets' => $projets,
        ));
    }

    public function showAction(Projet $projet)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('@Offre/offre/show.html.twig', array(
            'projet' => $projet,
        ));
    }

    public function mesoffresAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $em = $this->getDoctrine()->getManager();

        $offres = $em->getRepository('OffreBundle:Offre')->findAll();

        return $this->render('@Offre/Offre/mesoffres.html.twig', array(
            'offres' => $offres,
        ));
    }

    public function postulerAction(Request $request, Projet $projet)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $offre = new Offre();
        $form = $this->createForm(OffreType::class,$offre);
        $form = $form->handleRequest($request);
        if ($form->isValid()) {
            $offre->setIdprojet($projet);
            $offre->setIdfreelancer($user);
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
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $em=$this->getDoctrine()->getManager();
        $offre=$em->getRepository(Offre::class)->find($id);
        $em->remove($offre);
        $em->flush();
        return $this->redirectToRoute('offre_mesoffres');
    }

    public function updateAction(Request $request,$id)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
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
