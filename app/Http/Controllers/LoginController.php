<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

use App\User;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!Hash::check($fields['password'], $user->password)) {
                return response()->json([
                    'status'=>401,
                    'message' => 'Informacion invalida'
                ]);
        }

        $token = $user->createToken('token')->accessToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response()->json([
            'status'=>200,
            'user'=>$user,
        ]);
    }

public function logout(Request $request)
    {
            auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return [
            'message' => 'Sesion cerrada',
        ];
    }

}