<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    function login(Request $request) {
        $credentials = $request->only('email', 'password');
        $isLoggedIn = auth()->attempt($credentials);
        if($isLoggedIn){
            $token = $request->user()->createToken('authToken')->plainTextToken;
            return response()->json([
                'token' => $token,
            ]);
        }
        return response()->json([
            'message' => 'Unauthorized',
        ], 401);
    }

    function logout(Request $request) {
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json([
            'message' => 'Logged out',
        ]);
    }

    function register(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        return response()->json($user, 201);
        // return response()->json([
        //     'message' => 'success',
        // ]);
    }

    function me(Request $request) {
        $user = $request->user();
        return response()->json($user, 200);
    }
}

// 3|VullkCFQv6dc2cm7tmdukkx36J5MjsLcKYQkzUSg8f080451  = john
// 7|wMAmWwRrtb0dCKR8TuX6gsxSo2Y8oG5RnBZ5Isu5df40d3b6 = hasin
