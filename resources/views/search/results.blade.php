@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
         <h1>Results</h1>

         @foreach ($users as $user)
         <div style="display:flex; padding: 10px; border: 1px solid black;">
            <a href="/profile/{{$user->id}}">
                <div style="padding-right: 10px">{{ $user->id}}</div>
            </a>
            <div style="padding-right: 10px">{{ $user->name}}</div>
            <div style="padding-right: 10px">{{ $user->username}}</div>
        </div>
         @endforeach
    </div>
</div>
@endsection
