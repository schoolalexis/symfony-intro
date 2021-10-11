<?php

// src/Controller/SioController.php  

namespace App\Controller;  

use Symfony\Component\HttpFoundation\Response;  
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class SioController extends AbstractController
{
    /**
     * @Route("/", methods={"GET"}, name="hello")
     */
    public function indexAction()
    {
       $request =  Request::createFromGlobals();

       $ip = $request->getClientIp();
       $lang = $request->getLanguages();

       //flash add :
       // $this->addFlash('hello', 'hello');

       return $this->render('sio/hello.html.twig', array(
           'ip' => $ip,
           'lang' => $lang
       ));
    }

    /**
     * @Route("/hello/{nameInput}", methods={"GET"}, name="hello_step_two")
     */
    public function helloAction(string $nameInput = "Inconnu !")
    {
        $arg = preg_split('/(_|[\s,]+)/', $nameInput);

        if (count($arg) > 1)
        {
            $name = $arg[0];
            $lastName = $arg[1];
        } else {
            $name = $arg[0];
            $lastName = null;
        }

        return $this->render('sio/helloWithName.html.twig', array(
            'name' => $name,
            'lastname' => $lastName
        ));
    }


} 