<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function getAll()
    {
        $posts = Post::all();
        return response($posts, 200);
    }

    public function store(Request $request)
    {
        $date = date('d-m-y h:i:s');

        $post = new Post;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->imageUrl = $request->imageUrl;
        $post->createAt = $date;
        $post->userId = $request->userId;

        $post->save();
        return response()->json(["result" => "Post Created!"], 201);
    }

    public function getById($id)
    {
        $post = Post::find($id);
        return response($post, 200);
    }

    public function update(Request $request, $id)
    {
        $date = date('d-m-y h:i:s');

        $post = Post::find($id);
        $post->name = $request->get('name');
        $post->description = $request->get('description');
        $post->imageUrl = $request->get('imageUrl');
        $post->createAt = $date;
        $post->userId = $request->get('userId');

        $post->save();
        return response()->json(["result" => "Post Updated!"], 200);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json(["result" => "Post Deleted!"], 200);
    }
}
