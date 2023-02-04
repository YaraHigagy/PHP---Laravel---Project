<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // dd($posts);

        return PostResource::collection($posts);
        // $response  = [];

        // foreach($posts as $post)
        // {
        //     $response [] = [
        //         'id' => $post->id,
        //         'title' => $post->title,
        //         'description' => $post->description,
        //     ];
        // }

        // return $response;
    }

    public function show($postId)
    {
        $post = Post::find($postId);

        return new PostResource($post);
        // return [
        //     'id' => $post->id,
        //     'title' => $post->title,
        //     'description' => $post->description,
        // ];
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->all(); 
        $title = $data['title'];
        $description = $data['description'];
        $userId = $data['post_creator'];

        $post = Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $userId,
        ]);
        return $post;
    }
}
