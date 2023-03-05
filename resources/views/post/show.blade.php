@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <div style="display:flex; flex-direction: column;">
                <h1>{{ $post->caption }}</h1>
    
                <img style="width:450px; height: 450px;" src="/storage/{{ $post->image }}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
