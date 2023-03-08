@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($posts as $post)
        <a href="/profile/{{$post->user->id}}">    
            <div style="padding-bottom: 20px;" class="col-6 offset-3">
                <img style="width:100%; padding-right: 15px; padding-bottom: 10px;" src="/storage/{{ $post->image }}" alt="" />
                <p>{{ $post->caption }}</p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
