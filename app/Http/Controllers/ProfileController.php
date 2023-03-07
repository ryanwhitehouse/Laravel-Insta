<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        return view('profile.index', compact('user'));
    }

    /**
     * Shows the edit user profile page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(User $user)
    {        
        $this->authorize('update', $user->profile);

        return view('profile.edit', compact('user'));
    }

    /**
     * Updates the user's profile
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update()
    {      
        $currentUser = Auth::user();
        $this->authorize('update', $currentUser->profile);

        $validatedRequest = request()->validate([
            'title' => 'max:255|required',
            'description' => 'max:255|required',
            'url' => 'url',
            'image' => 'max:255',
        ]);
        
        if(request('image')) {
            $imagePath = $validatedRequest['image']->store('profile', 'public');
            
            Image::make(public_path("storage/$imagePath"))->fit(350, 350)->save();
    
            $validatedRequest = array_merge(
                $validatedRequest,
                ['image' => $imagePath],
            );
        }

        Auth::user()->profile()->update($validatedRequest);

        return redirect("/profile/$currentUser->id");
    }
}
