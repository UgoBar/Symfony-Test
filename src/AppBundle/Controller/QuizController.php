<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @Route("/quiz")
 */
class QuizController extends Controller
{
    /**
     * @Route("/", name="quiz_index")
     */
    public function indexAction(Request $request)
    {

        $quizData = [
            [
                'question' => 'première lettre de l\'alphabet ?',
                'answers' => [
                    ['text' => 'a', 'response' => true],
                    ['text' => 'b', 'response' => false],
                    ['text' => 'c', 'response' => false],
                    ['text' => 'd', 'response' => false],
                ],
                'score' => 10
            ],
            [
                'question' => 'deuxième lettre de l\'alphabet ?',
                'answers' => [
                    ['text' => 'a', 'response' => false],
                    ['text' => 'b', 'response' => true],
                    ['text' => 'c', 'response' => false],
                    ['text' => 'd', 'response' => false],
                ],
                'score' => 10
            ],
            [
                'question' => 'troisième lettre de l\'alphabet ?',
                'answers' => [
                    ['text' => 'a', 'response' => false],
                    ['text' => 'b', 'response' => false],
                    ['text' => 'c', 'response' => true],
                    ['text' => 'd', 'response' => false],
                ],
                'score' => 10
            ],
        ];

        // Coder la function groupByName
        $form = $this->createFormBuilder([]);
        // Récupérations des questions et des réponses
        for($i=0 ; $i < count($quizData) ; $i++) {

            // Récupération des questions
            $questions = $quizData[$i]['question'];

            // A ESSAYER DEMAIN :
            // ATTRIBUER DES REPONSES PAR RAPPORT AUX QUESTIONS
            // EN FONCTION DE CHAQUE ITERATION DE BOUCLE
            // VOIR LE PROPERTY ACCESSOR

            // Récupération des réponses et de leurs valeurs
            $answersArray = $quizData[$i]['answers'];
            foreach($answersArray as $key => $values)  {
                //dump($values);
                foreach($values as $key => $value) {
                    if($key == 'text') {
                        $answer = $value;
                    }
                    if($key == 'response') {
                        $response = $value;
                    }
                }
            }

            $form->add('question'.$i, ChoiceType::class, [
                'choices' => ['a' => false], // donnée en dur pour tester
                'expanded' => true,
                'multiple' => false,
                'label' => 'Quelle est la '.$questions,
            ]);
        }

        
        $form->add('submit', SubmitType::class, ['label' => 'Envoyer']);
        $form = $form->getForm();


        if($request->getMethod() === Request::METHOD_POST) {

            /**
             * HANDLE FORM HERE
             */

            $this->redirectToRoute('quiz_result');
        }

        return $this->render('quiz/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/result", name="quiz_result")
     */
    public function resultIndex(Request $request)
    {
        $score = 0;

        return $this->render('quiz/result.html.twig', [
            'score' => $score,
        ]);
    }
}