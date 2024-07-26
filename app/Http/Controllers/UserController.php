<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $users = User::all();
        return response()->json(['data' => $users], 200);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(['data' => $user], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:4|max:100',
            'username' => 'required|string|min:4|max:100|unique:users',
            'password' => 'required|string|min:8|max:100|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid Input', 'validations' => $validator->errors()], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'username berhasil disimpan'], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:4|max:100',
            'username' => 'required|string|min:4|max:100|unique:users,username,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid Input', 'validations' => $validator->errors()], 400);
        }

        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->update($request->only(['name', 'username']));

        return response()->json(['message' => 'username berhasil diperbarui'], 200);
    }

    public function updatePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|max:100|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid Input', 'validations' => $validator->errors()], 400);
        }

        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->update(['password' => bcrypt($request->password)]);

        return response()->json(['message' => 'password berhasil diperbarui'], 200);
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'user berhasil dihapus'], 200);
    }
}
