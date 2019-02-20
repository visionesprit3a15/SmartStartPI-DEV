<?php

namespace ChallengeBundle\Controller;

use ChallengeBundle\Entity\Question;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class QuestionController extends Controller
{
    public function createAction(Request $request)
    {
        $question = new Question();
        $form = $this->createFormBuilder($question)
            ->add('description',TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('reponse', TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('choix',TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('challenge',EntityType::class,array(
                'class' =>'ChallengeBundle\Entity\Challenge',
                'choice_label' => 'nom',
                'multiple'=>false
            ), array('attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('save',SubmitType::class, array('label'=>'save', 'attr'=>array('class'=>'btn btn-primary', 'style'=>'margin-bottom:15px')))
            ->getForm();
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $description = $form['description']->getData();
            $reponse = $form['reponse']->getData();
            $choix = $form['choix']->getData();
            $challenge = $form['challenge']->getData();




            $question->setDescription($description);
            $question->setReponse($reponse);
            $question->setChoix($choix);
            $question->setChallenge($challenge);

            //$challenge->setUser($user);


            $sn = $this->getDoctrine()->getManager();
            $sn->persist($question);
            $sn->flush();




            return $this->redirectToRoute('read_question');
        }

        return $this->render('@Challenge/Question/create.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function readAction()
    { $questions=$this->getDoctrine()->getRepository(Question::class)->findAll();

        return $this->render('@Challenge/Question/read.html.twig', array(
            'questions' => $questions
        ));
    }

    public function updateAction(Request $request,$id)
    {
        $question = $this->getDoctrine()->getRepository(Question::class)->find($id);

        $question->setDescription($question->getDescription());
        $question->setReponse($question->getReponse());
        $question->setChoix($question->getChoix());
        $question->setChallenge($question->getChallenge());

        $form = $this->createFormBuilder($question)
            ->add('description',TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('reponse', TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('choix',TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('challenge',EntityType::class,array(
                'class' =>'ChallengeBundle\Entity\Challenge',
                'choice_label' => 'nom',
                'multiple'=>false
            ), array('attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('save',SubmitType::class, array('label'=>'save', 'attr'=>array('class'=>'btn btn-primary', 'style'=>'margin-bottom:15px')))
            ->getForm();
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $description = $form['description']->getData();
            $reponse = $form['reponse']->getData();
            $choix = $form['choix']->getData();
            $challenge = $form['challenge']->getData();

            $sn = $this->getDoctrine()->getManager();
            $question=$sn->getRepository(Question::class)->find($id);


            $question->setDescription($description);
            $question->setReponse($reponse);
            $question->setChoix($choix);
            $question->setChallenge($challenge);

            //$challenge->setUser($user);

            $sn->flush();

            return $this->redirectToRoute('read_question');
        }

            return $this->render('@Challenge/Question/update.html.twig', array(
                'form'=>$form->createView()
        ));
    }

    public function deleteAction($id)
    {
        $sn = $this->getDoctrine()->getManager();
        $question=$sn->getRepository(Question::class)->find($id);
        $sn->remove($question);
        $sn->flush();
        return $this->redirectToRoute('read_question');
    }

}
