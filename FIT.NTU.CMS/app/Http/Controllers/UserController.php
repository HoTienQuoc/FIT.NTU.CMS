<?php
namespace App\Http\Controllers;
use App\Models\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show()
    {
        return view("user");
    }
    public function fetchUsers()
    {
        return response()->json(UserModel::all());
    }
    public function update(Request $request, string $id)
    {
        $userItem = UserModel::find($id);
        $userItem->update($request->all());
        // $data = $request->validate([
        //     "name" => "required|string",
        //     "email" => "required|email|unique:users,email",
        //     "roles" => "nullable|array",
        // ]);
        // $data["password"] = Hash::make("default_password"); // or from input
        return response()->json($userItem, 201);
    }

    public function create(Request $request)
    {
        // print_r($request->all());
        $data = $request->all();
        $user = UserModel::create($data);
        // $data = $request->validate([
        //     "name" => "required|string",
        //     "email" => "required|email|unique:users,email",
        //     "roles" => "nullable|array",
        // ]);
        // $data["password"] = Hash::make("default_password"); // or from input
        return response()->json($user, 201);
    }
    public function destroy(string $id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();
        return response()->json(["message" => "User deleted successfully"]);
    }
}
