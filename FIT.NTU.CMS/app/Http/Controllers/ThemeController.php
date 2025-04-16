<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function show()
    {
        return view("post");
    }
    public function fetchThemes()
    {
        return response()->json(ThemeModel::all());
    }
    public function update(Request $request, string $id)
    {
        $themeItem = ThemeModel::find($id);
        $themeItem->update($request->all());
        return response()->json($themeItem, 201);
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $theme = ThemeModel::create($data);
        return response()->json($theme, 201);
    }
    public function destroy(string $id)
    {
        $themeItem = ThemeModel::find($id);
        $themeItem->delete();
        return response()->json(["message" => "Theme deleted successfully"]);
    }
}
