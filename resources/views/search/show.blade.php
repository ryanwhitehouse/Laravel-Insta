@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
         <form method="POST" action="/search/results">
        @csrf
            <div class="row mb-3">
                <label for="search" class="col-md-4 col-form-label">{{ __('Search') }}</label>
                <input 
                    id="search" 
                    type="text" 
                    class="form-control @error('search') is-invalid @enderror" 
                    name="search" 
                    value="{{ old('search') }}" 
                    required 
                    autocomplete="search" 
                    autofocus>

                @error('search')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            </div>

            <div class="row" style="padding-top: 20px">
                <button type="submit" class="btn btn-primary">
                    {{ __('Search') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
