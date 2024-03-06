<?php

namespace App\Controller;

use App\Taxes\Calculator;
use App\Taxes\Detector;
use Cocur\Slugify\Slugify;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello/{prenom?world}" , name="hello")
     */

    public function hello($prenom = "world",)
    {
        return $this->render('hello.html.twig', [
            'prenom' => $prenom
        ]);
    }

    /**
     * @Route("/example", name="example")
     */

    public function example(){
       return $this->render('example.html.twig' , [
        'age' => 33
       ]);
    }

}
