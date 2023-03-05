<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Allow the user to create a post
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('post.create');
    }
}
