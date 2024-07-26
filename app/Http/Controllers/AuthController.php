<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:4|max:100',
            'password' => 'required|string|min:8|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid Input', 'validations' => $validator->errors()], 400);
        }

        $credentials = $request->only('username', 'password');

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['message' => 'username atau password salah'], 401);
        }

        return response()->json(['data' => ['token' => $token]]);
    }
}
