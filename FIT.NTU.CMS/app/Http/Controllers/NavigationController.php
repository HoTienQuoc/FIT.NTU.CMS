<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NavigationModel;

class NavigationController extends Controller
{
    public function show()
    {
        return view("navigation");
    }
    public function fetchNavigations()
    {
        return response()->json(NavigationModel::all());
    }
    public function update(Request $request, string $id)
    {
        $navigationItem = NavigationModel::find($id);
        $navigationItem->update($request->all());
        return response()->json($navigationItem, 201);
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $navigation = NavigationModel::create($data);
        return response()->json($navigation, 201);
    }
    public function destroy(string $id)
    {
        $navigationItem = NavigationModel::find($id);
        $navigationItem->delete();
        return response()->json([
            "message" => "Navigation deleted successfully",
        ]);
    }
}
