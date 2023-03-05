@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img style="width:450px; height: 450px;" src="/storage/{{ $post->image }}" alt="">
        </div>
        <div class="col-4">
            <div>
                <h3>{{ $post->caption }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection
