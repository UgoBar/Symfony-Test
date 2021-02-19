<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Fizz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Buzz;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/test", name="test")
     */
    public function testAction(Request $request)
    {
        // Error
        // PLEASE DO SOMETHING
        return $this->render('default/test.html.twig');
    }

    /**
     * @Route("/doctrine", name="doctrine")
     */
    public function doctrineAction(Request $request)
    {
        $fizzs = $this->getFizzs();

        return $this->render('default/doctrine.html.twig', [
            'fizzs' => $fizzs,
        ]);
    }

    /**
     * @Route("/form", name="form")
     */
    public function formAction(Request $request)
    {
        $form = $this->createFormBuilder([]);
        $form->add('firstname', TextType::class);
        $form->add('lastname', TextType::class);
        $form->add('email', EmailType::class);
        $form->add('submit', SubmitType::class);

        $form = $form->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $data = $form->getData();

            $this->redirectToRoute('quiz');
        }

        $data = $form->getData();

        return $this->render('default/form.html.twig', [
           'form' => $form->createView(),
            'data' => $data,
        ]);
    }

    /**
     * @Route("/fizzbuzz", name="fizzbuzz")
     */
    public function fizzbuzzAction(Request $request)
    {

        // PLEASE ADD 1 Fizz WITH 100 Buzz

        // Fizz : set name to: fizzbuzz
        // Buzz : set name to: current number
        // if any number is divisible by three the name should be : "fizz"; divisible by five "buzz"
        // numbers divisible by both should be named : fizzbuzz
        // ex : $buzz = new Buzz(); $buzz->setName('1'); ... $buzz->setName('2'); $buzz->setName('fizz');
        
        $fizz = new Fizz();
        $fizz->setName('fizzbuzz');

        // INSERT IN BDD !
        $manager = $this->getDoctrine()->getManager();

        for($i=1 ; $i<=100 ; $i++)
        {
            $buzz = new Buzz();
            if($i%3 === 0 && $i%5 === 0) {
                $buzz->setName('fizzbuzz');
            }

            else if($i%3 === 0) {
                $buzz->setName('fizz');
            }
                
            else if($i%5 === 0) {
                $buzz->setName('buzz');
            }
                
            else {
                $buzz->setName((string)$i);
            }

            $buzz->setFizz($fizz);

            $fizz->addBuzz($buzz);
            $manager->persist($buzz);
        }

        $manager->persist($fizz);
        $manager->flush();    


        return $this->render('default/doctrine.html.twig', [
            'fizzs' => $this->getDoctrine()->getRepository(Fizz::class)->findBy(['name' => 'fizzbuzz']),
        ]);
    }

    private function getFizzs()
    {
        // MAPPING ERROR ?
        // PLEASE DO SOMETHING

        // Greedy : Too many request
        // PLEASE DO SOMETHING !

        return $this->getDoctrine()->getRepository(Fizz::class)->findAll();
    }

}
