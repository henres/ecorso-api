<?php

namespace Ecorso\User;

use Doctrine\Common\Collections\ArrayCollection;

class UserCollection extends ArrayCollection
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $users = [])
    {
        parent::__construct();

        array_walk($users, [$this, 'add']);
    }

    /**
     * {@inheritdoc}
     */
    public function add($user)
    {
        if (!$user instanceof User) {
            @trigger_error(sprintf('A user must be of type `%s`.', User::class), E_USER_WARNING);

            return false;
        }

        $key = $user->getId()->getValue();
        if (true === $this->containsKey($key)) {
            @trigger_error(sprintf('The user `%s` already exists.', $key), E_USER_WARNING);

            return false;
        }

        return parent::set($key, $user);
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated Use add() method instead
     */
    public function set($key, $value)
    {
        @trigger_error(sprintf('`%s` is deprecated, use `%s::add` instead.', __METHOD__, self::class), E_USER_DEPRECATED);

        return false;
    }
}
