<?php

namespace App\Http\Controllers;

use App\Models\PageModel;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show()
    {
        return view("page");
    }
    public function fetchPages()
    {
        return response()->json(PageModel::all());
    }
    public function update(Request $request, string $id)
    {
        $pageItem = PageModel::find($id);
        $pageItem->update($request->all());
        return response()->json($pageItem, 201);
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $post = PageModel::create($data);
        return response()->json($post, 201);
    }
    public function destroy(string $id)
    {
        $pageItem = PageModel::find($id);
        $pageItem->delete();
        return response()->json(["message" => "Page deleted successfully"]);
    }
}
