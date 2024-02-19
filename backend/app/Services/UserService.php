<?php

namespace App\Services;

use App\Interfaces\Repository;
use App\Repositories\UserRepository;

class UserService
{
    public function __construct(
        private UserRepository $userRepository
    )
    {}

    public function storeUser(array $attributes)
    {   
        return $this->userRepository->create($attributes);
    }


}
