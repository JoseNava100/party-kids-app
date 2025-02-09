<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        if ($roles->isEmpty()) {
            
            $message = [
                'message' => 'Do not have roles',
                'status' => 400,
            ];

            return response()->json($message, 400);

        } else {
            
            $message = [
                'message' => 'All roles',
                'data' => $roles,
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
            'name' => 'required|string|max:255|unique:roles',
            'description' => 'nullable|string|max:255',
        ]);

        if ($validation->fails()) {
            
            $message = [
                'message' => 'Error in data validation',
                'errors' => $validation->errors(),
                'status' => 400,
            ];

            return response()->json($message, 400);

        } else {
            
            $roles = Role::create($request->only([
                'name',
                'description',
            ]));

            if (!$roles) {

                $message = [
                    'message' => 'Error creating role',
                    'status' => 400
                ];

                return response()->json($message, 400);

            } else {

                $message = [
                    'message' => 'Role created',
                    'data' => $roles,
                    'status' => 200,
                ];

                return response()->json($message, 200);
            }


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
