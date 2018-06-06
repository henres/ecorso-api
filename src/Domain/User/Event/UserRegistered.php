<?php

namespace Ecorso\User\Event;

use Symfony\Component\EventDispatcher\Event;
use Ecorso\User\User;

class UserRegistered extends Event
{
    const NAME = 'user.registered';

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
}
