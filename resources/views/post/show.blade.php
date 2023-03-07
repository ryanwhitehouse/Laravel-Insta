@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img style="width:450px; height: 450px;" src="/storage/{{ $post->image }}" alt="">
        </div>
        <div class="col-4">
            <div>
                <div style="display: flex; align-items: center">
                    <img style="height:70px; padding-right: 15px" src="{{ $post->user->profile->profileImage() }}" alt="" />
                <h3><a href="/profile/{{$post->user->id}}">{{ $post->user->username }}</a></h3>
                @unless(Auth::user()->can('update', $post->user->profile))
                <a style="margin-left: 20px;" href="#">Follow</a>
                @endunless
                </div>
                <hr />
                <p><a href="/profile/{{$post->user->id}}">{{ $post->user->username }}</a> - {{ $post->caption }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
