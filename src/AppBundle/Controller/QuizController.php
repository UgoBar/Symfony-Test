<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\HttpFoundation\Session\Session;

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

        $form = $this->createFormBuilder();
        $data = ''; // Initialisation des datas vide

        //Je ne connaissais pas cette utilisation mais c'est joli, peu être un peu compliqué pour pas grand chose
        //Mais belle illustration de ta compréhension :)
        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        // Récupérations des questions et des réponses
        foreach($quizData as $key => $value) {

            // Récupération des questions
            $questions = $value['question'];
            // récupération du score de la question
            $score = $value['score'];

            // Récupération des choix et des réponses
            $answersArray = $value['answers'];
            for($t=0 ; $t < count($answersArray) ; $t++) {

                // Récupération des choix en tant que clefs et des réponses en tant que valeurs dans un tableau
                $radioData[$propertyAccessor->getValue($answersArray, "[$t][text]")] = $propertyAccessor->getValue($answersArray, "[$t][response]");
                
                // Attribution des points aux réponses du tableau $radioData
                if($radioData[$propertyAccessor->getValue($answersArray, "[$t][text]")] === true) {
                    $radioData[$propertyAccessor->getValue($answersArray, "[$t][text]")] = $score;
                }
                else {
                    $radioData[$propertyAccessor->getValue($answersArray, "[$t][text]")] = 0;
                }
                
                // Ajout des données dans le formulaire
                $form->add('question'.$key, ChoiceType::class, [
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

        // vérifictation de la méthode du formulaire
        if($request->getMethod() === Request::METHOD_POST) {

            // Vérification des données du formulaire
            if ($form->isSubmitted() && $form->isValid()) {

                // Récupération des données envoyées par le formulaire
                $data = $form->getData();

                // Récupération de la session
                $session = $this->container->get('session');

                // Calcul des scores
                $total=0;
                $result = [];
                foreach($data as $dataKey => $dataValue) {
                    // Calcul du score total
                    $total += $dataValue;

                    // Calcul du score par question
                    $result[$propertyAccessor->getValue($quizData, '['.str_replace('question', '', $dataKey).'][question]')] = $dataValue;
                }

                // Insertion des datas dans la session pour l'envoyer à "resultIndex"
                $session->set('data', $result); // Score par question
                $session->set('total', $total); // Score total

                return $this->redirectToRoute('quiz_result');
            }
        }

        //au top :)

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
        //Rien à dire, top :)

        // Récupération des données insérées dans la session
        $session = $this->container->get('session');

        return $this->render('quiz/result.html.twig', [
            'totalScore' => $session->get('total'),
            'scorePerQuestion' => $session->get('data', []),
        ]);
    }
}
