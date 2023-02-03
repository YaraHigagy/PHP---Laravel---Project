<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;

class postController extends Controller
{
    public function index()
    {
        //select * from posts;
        $allposts = Post::all();  //  go to Post and the scope resolution is all posts
        // dd($allposts);
        // return view( view: 'home', [  //the second (view) is wrong in my version of php or laravel as we don't need named arguments
        //The below syntax is right becuase all arguments are named
        // return view( view: 'home', parameters:[
        //     'posts' => $allposts,
        // ]);
        return view('posts.index', [
            //this assoc. array collects all the values of $allposts in its array and call them by $posts variable in home.blade.php
            'posts' => $allposts,
        ]);
    }

    public function create()  //It's just for going to create post page
    {
        $users = User::get();
        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store(StorePostRequest $request)  //This is for storing created posts into database
    {
        // //Validation
        // $request -> validate([
        //     'title' => ['required', 'min:3'],
        //     'description' => ['required', 'min:5'],
        // ],[
        //     'title.required' => 'Your post must have a title',
        //     'title.min' => 'The title has to be longer than 3 letters',
        // ]);

        // dd($_POST);  //This is native method, and request is a laravel method and is better 
        // $data = request()->all();  //good syntax
        // $title = $data['title'];
        // $description = $data['description'];
        // $title = request()->title;  //another syntax
        // $description = request()->description;
        $data = $request->all();  //the instructor's favourite syntax
        $title = $data['title'];
        $description = $data['description'];
        $userId = $data['post_creator'];

        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $userId,
        ]);
        return to_route('posts.index');
    }

    public function show($postId)  //I should read about (find) and (where) functions, to search for all posts that have a common thing (like searching by name)
    {
        $post = Post::where('id', $postId)->first();
        // $user = User::where('post_creator', $userId)->first();  //I didn't need it
        // dd($post); 
        return view('posts.show', [
            'post' => $post,
            // 'user_id' => $userId,  //I didn't need it
        ]);
    }

    public function edit($postId)
    {
        $post = Post::where('id', $postId)->first();
        $users = User::get();
        return view('posts.edit',[
            'post' => $post,
            'users' => $users,
        ]);
    }

    public function update(Request $request, $postId)
    {
        //Validation
        $request -> validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
        ]);

        $post = Post::where('id', $postId)->first();
        $data = $request->all();  
        $title = $data['title'];
        $description = $data['description'];
        $userId = $data['post_creator'];
        Post::update([
            'title' => $title,
            'description' => $description,
            'user_id' => $userId,
            // 'post' => $post,
            // 'users' => $users,
        ]);
        return to_route('posts.index');
    }

    public function destroy($postId)
    {
        $deleted = Post::where('id', $postId)->delete();
        // return view('posts.index');
    }
}
