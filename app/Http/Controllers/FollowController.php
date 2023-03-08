<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
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
     * Updates what the current user is following
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(User $user)
    {
        return auth()->user()->following()->toggle($user->profile);
    }

}
