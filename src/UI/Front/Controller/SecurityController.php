<?php

namespace Ecorso\UI\Front\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    function login()
    {
        return $this->render(
            'Security/login.html.twig',
            array(
                'form' => "Login form"
            )
        );
    }
}