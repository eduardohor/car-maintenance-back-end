<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        return $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }

    public function login(LoginRequest $request)
    {

        $credentials = $request->all();
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Usuário ou senha inválido!'], 403);
        };

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer'
        ]);
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['msg' => 'Logout realizado com sucesso!']);
    }

    public function refresh()
    {
        $token = auth('api')->refresh();
        return response()->json(['token' => $token]);
    }

    public function me()
    {
        return auth()->user();
    }
}
