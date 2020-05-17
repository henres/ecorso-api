<?php
namespace Ecorso\UI\Front\Model;

use Symfony\Component\Security\Core\User\UserInterface;

class User extends AbstractUser
{
    /**
     * @var string
     */
    private $password;

    /**
     * {@inheritdoc}
     * @param string $password
     */
    public function __construct(string $userId, ?string $uniqueContactId, string $username, string $password)
    {
        parent::__construct($userId, $uniqueContactId, $username, $username);
        $this->password = $password;
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * {@inheritdoc}
     */
    public function isEqualTo(UserInterface $user)
    {
        if ($this->password !== $user->getPassword()) {
            return false;
        }

        return parent::isEqualTo($user);
    }
}
