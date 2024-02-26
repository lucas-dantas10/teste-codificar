<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use HttpResponses;

    public function __construct(
        protected UserService $userService,
    )
    {}

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $userCreated = $this->userService->storeUser($data);

        return $this->response('Usuário criado!', 200, $userCreated);
    }

    public function getCurrentUser(Request $request)
    {
        $user = Auth::user();
        
        return $this->response('', 200, $user);
    }
}
