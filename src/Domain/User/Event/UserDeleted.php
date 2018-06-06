<?php

namespace Ecorso\User\Event;

use Symfony\Component\EventDispatcher\Event;
use Ecorso\User\User;

class UserDeleted extends Event
{
    const NAME = 'user.deleted';

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
