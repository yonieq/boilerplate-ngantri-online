<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    //
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = Auth::user();

        return response()->json([
            'message' => 'success',
            'data' => [
                'user' => $user,
                'token' => $token,
                'type' => 'Bearer'
            ]
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user =  User::create([
           'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = Auth::login($user);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user'=> $user,
            'auth' => [
                'token' => $token,
                'type' => 'Bearer'
            ]
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json([
            'message' => 'User logged out successfully'
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'message' => 'success',
            'data' => [
                'token' => Auth::refresh(),
                'type' => 'Bearer'
            ]
        ]);
    }

    public function me()
    {
        return response()->json([
            'message' => 'success',
            'data' => Auth::user()
        ]);
    }
}
