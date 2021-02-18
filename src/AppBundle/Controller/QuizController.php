<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\PropertyAccess\PropertyAccess;

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
                'score' => 50
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
        $data = ''; // Initialisation des data vide
        $totalScore = 0; // Initialisation du score total à 0

        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        // Récupérations des questions et des réponses
        for($i=0 ; $i < count($quizData) ; $i++) {

            // Récupération des questions
            $questions = $propertyAccessor->getValue($quizData, "[$i][question]");
            // récupération du score de la question
            $baseScore[$questions] = $propertyAccessor->getValue($quizData, "[$i][score]");
            // dump($baseScore);

            // Récupération des choix et des réponses
            $answersArray = $quizData[$i]['answers'];
            for($t=0 ; $t < count($answersArray) ; $t++) {

                // Récupération des choix en tant que clefs et des réponses en tant que valeurs dans un tableau
                $radioData[$propertyAccessor->getValue($answersArray, "[$t][text]")] = $propertyAccessor->getValue($answersArray, "[$t][response]");
                // dump($radioData);

                // Ajout des données dans le formulaire
                $form->add('question'.$i, ChoiceType::class, [
                    'choices' => $radioData,
                    'expanded' => true,
                    'multiple' => false,
                    'label' => 'Quelle est la '.$questions,
                ]);
            }
        }

        $form->add('submit', SubmitType::class, ['label' => 'Envoyer']);
        $form = $form->getForm();
        $form->handleRequest($request);

        if($request->getMethod() === Request::METHOD_POST) {

            if ($form->isSubmitted() && $form->isValid()) {

                // Récupération des données envoyées par le formulaire
                $data = $form->getData();
                dump($data);

                // Rangement des scores par questions dans le tableau des data
                // Calcul du score total
                foreach($data as $dataKey => $dataValue) {

                    // Si la réponse est juste on récupère la valeur du score de la question
                    if($dataValue === true) {
                        
                        // $scores[$dataKey] = $baseScore[0];
                        foreach($baseScore as $key => $valuePerQuestion) {
                        //     // $scores[$key] = $valuePerQuestion;
                        //     dump($valuePerQuestion);
                        }
                        //$totalScore += $score;
                        // $baseScore[0];
                        
                    }
                    else {
                        $scores[$dataKey] = 0 ;
                    }
                }

                dump($baseScore);
                $scores = 0;
                dump($scores);
                dump($totalScore);
                $this->redirectToRoute('quiz_result');
            }
        }

        return $this->render('quiz/index.html.twig', [
            'form' => $form->createView(),
            'data' => $data,
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