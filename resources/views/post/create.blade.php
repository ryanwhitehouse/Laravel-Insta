@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <form method="POST" enctype="multipart/form-data" action="{{ route('post') }}">
                @csrf

                <div class="row mb-3">
                    <label for="caption" class="col-md-4 col-form-label">{{ __('Post Caption') }}</label>
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" 
                        name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Post Image') }}</label>
                    <input type="file" class="form-control-file" id="image" name="image" />

                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="row" style="padding-top: 20px">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add New Post') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
