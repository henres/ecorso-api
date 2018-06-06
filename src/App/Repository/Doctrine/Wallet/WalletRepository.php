<?php

namespace Ecorso\App\Repository\Doctrine\Wallet;

use Doctrine\ORM\EntityRepository;
use Ecorso\Wallet\Wallet;
use Ecorso\Wallet\WalletCollection;
use Ecorso\Wallet\WalletRepositoryInterface;

class WalletRepository extends EntityRepository implements WalletRepositoryInterface
{
    public function find($id): Wallet {
        $queryBuild = $this->createQueryBuilder('u')
            ->where('u.id = ?1');
        return $queryBuild->getQuery()->getOneOrNullResult();
    }

    public function findAll(): WalletCollection {
        $queryBuild = $this->createQueryBuilder('u');
        return new WalletCollection($queryBuild->getQuery()->getResult());
    }

    public function add(Wallet $wallet): void
    {
        $this->getEntityManager()->persist($wallet);
        $this->getEntityManager()->flush();
    }

    public function remove(Wallet $wallet): void
    {
        $this->getEntityManager()->remove($wallet);
        $this->getEntityManager()->flush();
    }
}
