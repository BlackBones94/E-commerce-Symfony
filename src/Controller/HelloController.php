<?php

namespace App\Controller;

use App\Taxes\Calculator;
use Cocur\Slugify\Slugify;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HelloController
{  

    protected $calculator;

    public function __construct(Calculator $calculator)
    {
        $this->calculator= $calculator;
    }


    /**
     * @Route("/hello/{prenom}" , name="hello")
     */

    public function hello( $prenom = "world", LoggerInterface $logger , Calculator $calculator , Slugify $slugify ,Environment $twig)
    {

        dump($slugify->slugify("Hello world"));
        dump($twig);

        $logger->error("Mon message de log");

        $tva = $this->calculator->calcul(100);
        dump($tva);

        return new Response("Hello $prenom");
    }
}
