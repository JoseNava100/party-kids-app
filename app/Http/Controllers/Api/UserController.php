<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            
            $message = [
                'message' => 'Do not have users',
                'status' => 400,
            ];

            return response()->json($message, 400);

        } else {
            
            $message = [
                'message' => 'All users',
                'data' => $users,
                'status' => 200,
            ];

            return response()->json($message, 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255', 
            'email' => 'required|string|email|max:255|unique:users', 
            'role_id' => 'required|exists:roles,id', 
            'phone' => 'nullable|string|unique:users|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validation->fails()) {

            $message = [
                'response' => 'Error in data validation',
                'error' => $validation->errors(),
                'status' => 400,
            ];

            return response()->json($message, 400);

        } else {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
            ]);

            $message = [
                'response' => 'User Created',
                'data' => $user,
                'status' => 201,
            ];

            return response()->json($message, 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
