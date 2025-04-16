<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show()
    {
        return view("post");
    }
    public function fetchPosts()
    {
        return response()->json(PostModel::all());
    }
    public function update(Request $request, string $id)
    {
        $postItem = PostModel::find($id);
        $postItem->update($request->all());
        return response()->json($postItem, 201);
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $post = PostModel::create($data);
        return response()->json($post, 201);
    }
    public function destroy(string $id)
    {
        $postItem = PostModel::find($id);
        $postItem->delete();
        return response()->json(["message" => "Post deleted successfully"]);
    }
}
