<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Validators\ValidatePostData;
use App\Http\Validators\ValidatePostUpdateData;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        $validate = ValidatePostData::validate($request);
        if($validate instanceof JsonResponse){
            return $validate;
        }
        $post = Post::create($validate);
        return new PostResource($post);
    }

    public function show(string $id)
    {
        try{
            $post = Post::findOrFail($id);
            return new PostResource($post);
        }catch(\Exception $error){
            return response()->json(['message' => 'Post not found'], 404);
        }
    }


    public function update(Request $request, string $id)
    {
        try{
          $validate = ValidatePostUpdateData::validate($request);
          if($validate instanceof JsonResponse){
            return $validate;
          }  

        $existingPost = Post::where('number', $request->number)->first();
        if ($existingPost && $existingPost->id != $id) {
            return response()->json(['message' => 'Post with this number already exists'], 409);
        }

          $post = Post::findOrFail($id);
          $post->update($validate);
          return new PostResource($post);
        }catch(\Exception $error){
            return response()->json(['message' => 'Post not found'], 404);
        }
    }

    public function destroy(string $id)
    {
        try{
            $post = Post::findOrFail($id);
            $post->delete();
            return response()->json(['message' => 'Post deleted'], 200);
        }catch(\Exception $error){
            return response()->json(['message' => 'Post not found'], 404);
        }
    }
}
