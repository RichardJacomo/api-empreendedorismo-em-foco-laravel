<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Validators\ValidatePostData;
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
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
