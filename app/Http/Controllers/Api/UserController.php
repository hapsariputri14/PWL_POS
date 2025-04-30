<?php

namespace App\Http\Controllers\Api;

use App\Models\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserModel::all();
    }

    public function store(Request $request)
    {
        return UserModel::create($request->all());
    }

    public function show($id)
    {
        return UserModel::find($id);
    }

    public function update(Request $request, $id)
    {
        $data = UserModel::find($id);
        $data->update($request->all());
        return $data;
    }

    public function destroy(UserModel $user)
    {
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
