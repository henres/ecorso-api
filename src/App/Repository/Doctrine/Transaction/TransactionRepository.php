<?php

namespace Ecorso\App\Repository\Doctrine\Transaction;

use Doctrine\ORM\EntityRepository;
use Ecorso\Transaction\Transaction;
use Ecorso\Transaction\TransactionCollection;
use Ecorso\Transaction\TransactionRepositoryInterface;

class TransactionRepository extends EntityRepository implements TransactionRepositoryInterface
{
    public function find($id): Transaction {
        $queryBuild = $this->createQueryBuilder('u')
            ->where('u.id = ?1');
        return $queryBuild->getQuery()->getOneOrNullResult();
    }

    public function findAll(): TransactionCollection {
        $queryBuild = $this->createQueryBuilder('u');
        return new UserCollection($queryBuild->getQuery()->getResult());
    }

    public function add(Transaction $user): void
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    public function remove(Transaction $user): void
    {
        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();
    }
}
