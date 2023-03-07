@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <img style="width:250px;" src="{{ $user->profile->profileImage() }}" alt="">
        </div>
        <div class="col-9">
            <div style="display: flex; justify-content: space-between; align-items: baseline;">    
                <div>
                    <h1>{{ $user->username }}</h1>
                    @unless(Auth::user()->can('update', $user->profile))
                    <follow-button user-id="{{$user->id}}" class="btn btn-primary">Follow</follow-button>
                    @endunless
                </div>

                @can('update', $user->profile)
                <a href="/post/create">Add New Post</a>
                @endcan
            </div>

            @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan

            <div style="display: flex;">
                <div style="padding-right: 20px"><strong>{{ $user->posts->count() }}</strong> Posts</div>
                <div style="padding-right: 20px"><strong>23k</strong> Followers</div>
                <div><strong>212</strong> Following</div>
            </div>
            @if($user->profile)
            <div>
                    {{ $user->profile->title }}
            </div>
            <div>
                    {{ $user->profile->description }}
            </div>
            <div>
                <a href="#">{{ $user->profile->url }}</a>
            </div>
            @endif
        </div>
    </div>
    
    <div class="row" style="margin-top: 20px;">

        @foreach ($user->posts as $post)
            <div class="col-4" style="padding-bottom: 15px;">
                <a href="/post/{{ $post->id }}"><img src="/storage/{{ $post->image }}" alt=""></a>
            </div>
        @endforeach
            
    </div>
</div>
@endsection
