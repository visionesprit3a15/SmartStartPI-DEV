<?php

namespace DemandeBundle\Controller;
use FOS\UserBundle\Model\UserInterface;
use DemandeBundle\Entity\Demande;
use DemandeBundle\Form\DemandeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MissionBundle\Entity\Mission;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DemandeController extends Controller
{
    public function afficheAction()
    {

        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

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
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('@Demande/demande/show.html.twig', array(
            'mission' => $mission,
        ));
    }

    public function mesdemandesAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $em = $this->getDoctrine()->getManager();

        $demandes = $em->getRepository('DemandeBundle:Demande')->findAll();

        return $this->render('@Demande/demande/mesdemandes.html.twig', array(
            'demandes' => $demandes,
        ));
    }

    public function postulerAction(Request $request,Mission $mission)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

            $demande = new Demande();
            $form = $this->createForm(DemandeType::class, $demande);
            $form = $form->handleRequest($request);
            if ($form->isValid()) {
                $demande->setIdmission($mission);
                $demande->setIdfreelancer($user);
                $mission->setNombrepersonne($mission->getNombrepersonne()-1);
                $em = $this->getDoctrine()->getManager();
                $em->persist($demande);
                $em->flush();
                return $this->redirectToRoute('demande_mesdemandes');
            }





                return $this->render('@Demande/demande/postuler.html.twig', array(
                    'form' => $form->createView()


                ));

        }




    public function updateAction(Request $request,$id)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $em=$this->getDoctrine()->getManager();
        $demande=$em->getRepository(Demande::class)->find($id);
        $form=$this->createForm(DemandeType::class,$demande);

        $form=$form->handleRequest($request);
        if ($form->isValid())
        {
            $em->flush();
            return $this->redirectToRoute('demande_mesdemandes');
        }

        return $this->render('@Demande/demande/update.html.twig', array(
            'form'=>$form->createView(),

        ));
    }

    public function deleteAction($id)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $em=$this->getDoctrine()->getManager();
        $demande=$em->getRepository(Demande::class)->find($id);
        $em->remove($demande);
        $em->flush();
        return $this->redirectToRoute('demande_mesdemandes');

    }



}
