<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            $user = Auth::user();

            $response = [
                'token' => $user->createToken('Token_Login:')->plainTextToken,
                'name' => $user->name,
                'email' => $user->email,
            ];

            $message = [
                'message' => 'Login successful',
                'data' => $response,
                'status' => 200,
            ];

            return response()->json($message, 200);
            
        } else {

            $message = [
                'message' => 'Authentication error',
                'status' => 400,
            ];

            return response()->json($message, 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function logout()
    {
        $user = Auth::user();

        $user->tokens()->delete();

        $message = [
            'message' => 'Logout successful',
            'status' => 200,
        ];

        return response()->json($message, 200);
    }
}
