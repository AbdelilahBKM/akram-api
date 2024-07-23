<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $fields['email'])->first();
        if(!$user){
            return response()->json(['message' => 'Invalide email!'], 401);
        }

        if(!Hash::check($fields['password'], $user->password)){
            return response()->json(['message'=> 'Incorrect password'], 401);
        }

        $token = $user->createToken('api_token')->plainTextToken;
        $response = [
            'message' => 'authenticated',
            'token' => $token
        ];

        return response()->json($response, 201);
    }

    public function logout(Request $request)
    {
    $request->user()->currentAccessToken()->delete();
    return response()->json(['message' => 'Logged out'], 200);
    }
}
