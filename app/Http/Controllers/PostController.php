<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

use App\Models\Post;
use App\Models\User;

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
     * Renders the index view
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $following = auth()->user()->following()->pluck('profile_user.user_id');

        // $posts = Post::whereIn('user_id', $following)->orderby('created_at', 'DESC')->get();
        $posts = Post::whereIn('user_id', $following)->with('user')->latest()->get();

        return view('post.index', compact('posts'));
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
     * Renders an individual post
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
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
        
        Image::make(public_path("storage/$imagePath"))->fit(350, 350)->save();

        Auth::user()->posts()->create([
            'caption' => $validatedRequest['caption'],
            'image' => $imagePath,
        ]);

        $userId = Auth::id();

        return redirect("profile/$userId");
    }
}
