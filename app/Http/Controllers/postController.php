<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    public $allposts = [
        [
            'id' => 1,
            'title' => 'Laravel',
            'description' => 'I am learning laravel',
            'posted_by' => 'Yara',
            'created_at' => '2023-01-30 10:05:00',
        ],
        [
            'id' => 2,
            'title' => 'PHP',
            'description' => 'I am learning php',
            'posted_by' => 'Nada',
            'created_at' => '2023-01-30 11:30:00',
        ],
    ];

    public function index()
    {
        // return view( view: 'home', [  //the second (view) is wrong in my version of php or laravel as we don't need named arguments
        //The below syntax is right becuase all arguments are named
        // return view( view: 'home', parameters:[
        //     'posts' => $allposts,
        // ]);
        return view('posts.index', [
            //this assoc. array collects all the values of $allposts in its array and call them by $posts variable in home.blade.php
            'posts' => $this->allposts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        return 'go to store';
    }
    public function show($postId)
    {
        // dd($postId);
        return view('posts.show', [
            'posts' => $this->allposts
        ]);
    }
    public function edit($postId)
    {
        return view('posts.edit', [
            'posts' => $this->allposts
        ]);
    }
    public function destroy($postId)
    {
        return view('posts.index', [
            'posts' => $this->allposts
        ]);
    }

    public function update($postId)
    {
        return view('posts.index', [
            'posts' => $this->allposts
        ]);
    }
}
