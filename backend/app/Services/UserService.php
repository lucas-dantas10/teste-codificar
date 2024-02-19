<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Interfaces\Repository;
use App\Repositories\UserRepository;
use App\Traits\HttpResponses;

class UserService
{
    use HttpResponses;

    public function __construct(
        private UserRepository $userRepository
    )
    {}

    public function storeUser(array $attributes)
    {   
        $user = $this->userRepository->create($attributes);

        if (!$user->wasRecentlyCreated)
        {
            return $this->error('Usuário já existe', 400);
        }

        return new UserResource($user);
    }


}
