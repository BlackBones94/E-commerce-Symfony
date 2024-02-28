<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    public function index()
    {
        dd("ça fonctionne");
    }

    /**
     * @Route("/test/{age<\d+>?0}", name="test",methods= {"GET" , "POST"}, schemes= {"https", "http"})
     */
    public function test(Request $request, $age)
    {

        return new Response("Vous avez $age ans");
    }
}
