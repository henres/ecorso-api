<?php

namespace Ecorso\UI\Front\Controller;

use Ecorso\User\Event\UserRegistered;
use Ecorso\Wallet\Transaction;
use Ecorso\Wallet\TransactionCollection;
use Ecorso\User\UserCollection;
use Ecorso\User\UserId;
use Ecorso\Wallet\TransactionId;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Ecorso\User\User;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\EventDispatcher\EventDispatcher;


class ProfilController extends Controller
{
    public function me()
    {
        return $this->render(
            'Profil/profil.html.twig',
            array(
                'me' => $this->getUser()
            )
        );
    }

    public function update()
    {
        return $this->render(
            'lucky/profil.html.twig',
            array(
                'profil' => $this->getUser()
            )
        );
    }
}
