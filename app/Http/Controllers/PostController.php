<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Renders the create post view
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Allows the user to create a post
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store()
    {
        $validatedRequest = request()->validate([
            'caption' => 'required|max:255',
            'image' => 'required',
        ]);

        $imagePath = $validatedRequest['image']->store('uploads', 'public');

        Auth::user()->posts()->create([
            'caption' => $validatedRequest['caption'],
            'image' => $imagePath,
        ]);

        $userId = Auth::id();

        return redirect("profile/$userId");
    }
}
