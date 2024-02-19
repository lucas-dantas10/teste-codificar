<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    use HttpResponses;

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return $this->error('Erro nos valores adicionados aos campos!', 400);
        }

        $credentials = [
            'email' => $validator->validated()['email'],
            'password' => $validator->validated()['password'],
        ];

        if (!Auth::attempt($credentials)) {
            return $this->response('Email ou Senha inválidos!', 422);
        }

        return $this->response('Autorizado', 200, [
            'token' => $request->user()->createToken('app')->plainTextToken,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->response("Usuário deslogado!", 200);
    }
}
