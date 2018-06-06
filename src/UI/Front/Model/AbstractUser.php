<?php

namespace Pichet\Bundle\FrontBundle\Model;

use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;

abstract class AbstractUser implements FrontUserInterface, EquatableInterface
{
    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * AbstractUser constructor.
     *
     * @param string      $userId
     * @param string|null $uniqueContactId
     * @param string      $username
     * @param string      $email
     */
    public function __construct(string $userId, string $username, string $email)
    {
        $this->userId          = $userId;
        $this->username        = $username;
        $this->email           = $email;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @return string|null
     */
    public function getUniqueContactId(): ?string
    {
        return $this->uniqueContactId;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return [
            'ROLE_USER',
            'ROLE_CUSTOMER',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof AbstractUser) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        if ($this->email !== $user->getEmail()) {
            return false;
        }

        return true;
    }
}
