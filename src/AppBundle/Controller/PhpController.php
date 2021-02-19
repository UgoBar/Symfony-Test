<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/php")
 */
class PhpController extends Controller
{
    /**
     * @Route("/", name="php_index")
     */
    public function indexAction(Request $request)
    {
        // Coder la function groupByName

        $data = [
            "in.txt" => "sobuzz",
            "run.sh" => "buzzy",
            "out.txt" => "sobuzz",
        ];


        return $this->render('php/index.html.twig', [
            'data' => $data,
            'result' => $this->groupByName($data)
        ]);
    }

    private function groupByName($array = [])
    {
        /*
         * En entrée un tableau associatif : key : file, value : owner
         * En sortie un tableau associatif : key : owner, value : array of file
         */

        //Yep niquel ! :)

        $result = [];
        foreach($array as $file => $owner) {
            if(isset($result[$owner])) {
                $result[$owner][] = $file;
            }
            else {
                $result[$owner] = [$file];
            }
        }
        return $result;
    }

    /**
     * @Route("/score", name="php_score")
     */
    public function scoreAction(Request $request)
    {

        $data = [
            [
                0,
                10,
                0,
                0,
            ],
            [
                0,
                0,
                0,
                10,
            ],
            [
                10,
                0,
                0,
                0,
            ],
            [
                0,
                0,
                10,
                0,
            ],
        ];


        $entry = [
            1,
            3,
            0,
            2,
        ];

        return $this->render('php/score.html.twig', [
            'data' => $data,
            'entry' => $entry,
            'result' => $this->getScore($data, $entry)
        ]);

    }

    private function getScore($data = [], $entry)
    {
        /*
         * additionner le score associer
         * data [ key : [value, value, value, value] ]
         * entry : [ key : value ]
         *
         */

        //TB :)

        $total = 0;
        foreach($entry as $key => $value) {
            $total += $data[$key][$value];
        }

        /*
         * EXEMPLE :
         * $entry[0] vaut 1, $data[0][1] = 10
         * $entry[1] vaut 3, $data[1][3] = 10
         * $entry[2] vaut 0, $data[2][0] = 10
         * $entry[3] vaut 2, $data[3][2] = 10
         */

        return $total;
    }
}
