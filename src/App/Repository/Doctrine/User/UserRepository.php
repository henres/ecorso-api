<?php

namespace Ecorso\App\Repository\Doctrine\User;

use Doctrine\ORM\EntityRepository;
use Ecorso\User\User;
use Ecorso\User\UserCollection;
use Ecorso\User\WalletRepositoryInterface;

class UserRepository extends EntityRepository implements WalletRepositoryInterface
{
    public function find($id): User {
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