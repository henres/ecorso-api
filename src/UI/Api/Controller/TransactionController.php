<?php

namespace Ecorso\UI\Api\Controller;

use Ecorso\Wallet\Transaction;
use Ecorso\Wallet\TransactionCollection;
use Ecorso\User\UserCollection;
use Ecorso\User\UserId;
use Ecorso\Wallet\UserWallet;
use Ecorso\Wallet\WalletCollection;
use Ecorso\Wallet\WalletId;
use Symfony\Component\HttpFoundation\Response;
use Ecorso\User\User;
use Symfony\Component\Serializer\Serializer;
use Money\Money;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class TransactionController
{
    public function list(string $userid)
    {
        $serializer = new Serializer(array(new ObjectNormalizer()), array(new JsonEncoder()));

        $userCollection = new UserCollection([
            User::register(new UserId('1'),'dupont', 'dupont@dupont.com'),
            User::register(new UserId('2'),'foo', 'foo@bar.com')
        ]);

        $userCollection->get('1')->addWallet(UserWallet::createAndAttach(
            new WalletId('1'),
            "Lcl",
            $userCollection->get('1')
        ));

        return new Response($serializer->serialize($userCollection->get("1")->getWallets(), 'json'));
    }

    public function item(string $userid)
    {
        $serializer = new Serializer(array(new ObjectNormalizer()), array(new JsonEncoder()));

        $userCollection = new UserCollection([
            User::register(new UserId('1'),'dupont', 'dupont@dupont.com'),
            User::register(new UserId('2'),'foo', 'foo@bar.com')
        ]);

        return new Response($serializer->serialize($userCollection->get('1'), 'json'));
    }
}
