<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PermissionModel;

class PermissionController extends Controller
{
    public function show()
    {
        return view("permission");
    }
    public function fetchPermissions()
    {
        return response()->json(PermissionModel::all());
    }
    public function update(Request $request, string $id)
    {
        $permissionItem = PermissionModel::find($id);
        $permissionItem->update($request->all());
        return response()->json($permissionItem, 201);
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $permission = PermissionModel::create($data);
        return response()->json($permission, 201);
    }
    public function destroy(string $id)
    {
        $permissionItem = PermissionModel::find($id);
        $permissionItem->delete();
        return response()->json([
            "message" => "Permission deleted successfully",
        ]);
    }
}
