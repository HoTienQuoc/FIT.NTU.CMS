<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;

class RoleController extends Controller
{
    public function show()
    {
        return view("role");
    }
    public function fetchRoles()
    {
        return response()->json(RoleModel::all());
    }
    public function update(Request $request, string $id)
    {
        $roleItem = RoleModel::find($id);
        $roleItem->update($request->all());
        // $data = $request->validate([
        //     "name" => "required|string",
        //     "email" => "required|email|unique:users,email",
        //     "roles" => "nullable|array",
        // ]);
        // $data["password"] = Hash::make("default_password"); // or from input
        return response()->json($roleItem, 201);
    }

    public function create(Request $request)
    {
        // print_r($request->all());
        $data = $request->all();
        $role = RoleModel::create($data);
        // $data = $request->validate([
        //     "name" => "required|string",
        //     "email" => "required|email|unique:users,email",
        //     "roles" => "nullable|array",
        // ]);
        // $data["password"] = Hash::make("default_password"); // or from input
        return response()->json($role, 201);
    }
    public function destroy(string $id)
    {
        $role = RoleModel::findOrFail($id);
        $role->delete();
        return response()->json(["message" => "Role deleted successfully"]);
    }
}
