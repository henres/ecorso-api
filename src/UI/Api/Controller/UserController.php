<?php

namespace Ecorso\UI\Api\Controller;

use Ecorso\Wallet\Transaction;
use Ecorso\Wallet\TransactionCollection;
use Ecorso\User\UserCollection;
use Ecorso\User\UserId;
use Ecorso\Wallet\TransactionId;
use Ecorso\Wallet\UserWallet;
use Ecorso\Wallet\WalletCollection;
use Ecorso\Wallet\WalletId;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Ecorso\User\User;
use Symfony\Component\Serializer\Serializer;
use Money\Money;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class UserController extends Controller
{
    public function list()
    {
        $serializer = new Serializer(array(new ObjectNormalizer()), array(new JsonEncoder()));

        /** @var UserCollection $userCollection */
        $userCollection = $this->get("ecorso.repository.user")->findAll();

        return new Response($serializer->serialize($userCollection, 'json'));
    }

    public function item(string $userid)
    {
        $serializer = new Serializer(array(new ObjectNormalizer()), array(new JsonEncoder()));

        $userCollection = new UserCollection([
            User::register(new UserId('1'),'dupont', 'dupont@dupont.com'),
            User::register(new UserId('2'),'foo', 'foo@bar.com')
        ]);

        return new Response($serializer->serialize($userCollection->get($userid), 'json'));
    }
}
