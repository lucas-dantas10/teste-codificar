<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            // mensagem de erro   
            return response()->json(['message' => 'erro']);
        }

        if (!Auth::attempt($validator->validated())) {
            // mensagem de erro
            return response()->json(['message' => 'erro']);
        }

        // mensagem de sucesso
        return response()->json(['message' => 'sucesso']);

        
    }

    public function logout()
    {

    }
}
