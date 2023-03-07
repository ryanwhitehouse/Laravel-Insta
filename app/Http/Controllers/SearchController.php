<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
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
     * Show the search page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(User $user)
    {
        return view('search.show', compact('user'));
    }

     /**
     * Show the search results page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function results()
    {
        $users = User::where('name', 'LIKE', '%'.request('search').'%')->get();

        return view('search.results', compact('users'));
    }
}
