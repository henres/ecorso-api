<?php

namespace Ecorso\UI\Api\Controller;

use Ecorso\Wallet\Transaction;
use Ecorso\Wallet\TransactionCollection;
use Ecorso\User\UserCollection;
use Ecorso\User\UserId;
use Ecorso\Wallet\UserWallet;
use Ecorso\Wallet\UserWalletCollection;
use Ecorso\Wallet\WalletId;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Ecorso\User\User;
use Symfony\Component\Serializer\Serializer;
use Money\Money;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class WalletController extends Controller
{
    public function list()
    {
        $serializer = new Serializer(array(new ObjectNormalizer()), array(new JsonEncoder()));

        /** @var UserWalletCollection $walletCollection */
        $walletCollection = $this->get("ecorso.repository.wallet")->findAllUserWallet();

        return new Response($serializer->serialize($walletCollection, 'json'));
    }

    public function item(string $userid)
    {
        $serializer = new Serializer(array(new ObjectNormalizer()), array(new JsonEncoder()));

        /** @var WalletCollection $walletCollection */
        $walletCollection = $this->get("ecorso.repository.wallet")->find($userid);

        return new Response($serializer->serialize($walletCollection, 'json'));
    }
}
