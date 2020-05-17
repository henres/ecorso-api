<?php

namespace Ecorso\UI\Front\Security;

use Ecorso\UI\Front\Model\User;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class FakeUserProvider implements UserProviderInterface
{
    public const USERNAMES = [
        'dupond@yopmail.com' => [
            'id' => '1'
        ],
        'foo@bar.com' => [
            'id' => '2'
        ]
    ];

    public function loadUserByUsername($username)
    {
        if (!array_key_exists($username, self::USERNAMES)) {
            throw new UsernameNotFoundException(
                sprintf('Username "%s" does not exist.', $username)
            );
        }

        return new User(
            self::USERNAMES[$username]['id'],
            $username,
            'ecorso'
        );
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return User::class === $class;
    }
}
