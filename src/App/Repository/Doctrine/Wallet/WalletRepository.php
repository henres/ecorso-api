<?php

namespace Ecorso\App\Repository\Doctrine\User;

use Doctrine\ORM\EntityRepository;
use Ecorso\Wallet\Wallet;
use Ecorso\Wallet\WalletUserCollection;
use Ecorso\Wallet\WalletRepositoryInterface;

class WalletRepository extends EntityRepository implements WalletRepositoryInterface
{
    public function find($id): Wallet {
        $queryBuild = $this->createQueryBuilder('u')
            ->where('u.id = ?1');
        return $queryBuild->getQuery()->getOneOrNullResult();
    }

    public function findAll(): UserCollection {
        $queryBuild = $this->createQueryBuilder('u');
        return new UserCollection($queryBuild->getQuery()->getResult());
    }

    public function add(User $user): void
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    public function remove(User $user): void
    {
        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();
    }
}