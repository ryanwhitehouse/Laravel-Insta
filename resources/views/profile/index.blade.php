@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <img style="height:250px;" src="https://www.shutterstock.com/image-vector/vector-isolated-fire-emoji-600w-1173468361.jpg" alt="">
        </div>
        <div class="col-9">
            <div style="display: flex; justify-content: space-between; align-items: baseline;">    
                <div><h1>{{ $user->username }}</h1></div>
                <a href="/post/create">Add New Post</a>
            </div>
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            <div style="display: flex;">
                <div style="padding-right: 20px"><strong>{{ $user->posts->count() }}</strong> Posts</div>
                <div style="padding-right: 20px"><strong>23k</strong> Followers</div>
                <div><strong>212</strong> Following</div>
            </div>
            <div>
                {{ $user->profile->title }}
            </div>
            <div>
            {{ $user->profile->description }}
            </div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    
    <div class="row">

        @foreach ($user->posts as $post)
            <div class="col-4" style="padding-bottom: 15px;">
                <a href="/post/{{ $post->id }}"><img src="/storage/{{ $post->image }}" alt=""></a>
            </div>
        @endforeach
            
    </div>
</div>
@endsection
