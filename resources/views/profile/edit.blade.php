@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <form method="POST" enctype="multipart/form-data" action="/profile/update">
                @csrf
                @method('PATCH')

                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label">{{ __('Title') }}</label>
                    <input 
                        id="title" 
                        type="text" 
                        class="form-control @error('title') is-invalid @enderror" 
                        name="title" 
                        value="{{ old('title') ?? $user->profile->title }}" 
                        required 
                        autocomplete="title" 
                        autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>
                    <input 
                        id="description" 
                        type="text"
                        class="form-control @error('description') is-invalid @enderror" 
                        name="description" 
                        value="{{ old('description') ?? $user->profile->description }}"
                        required 
                        autocomplete="description"
                        autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>

                <div class="row mb-3">
                    <label for="url" class="col-md-4 col-form-label">{{ __('Url') }}</label>
                    <input 
                        id="url" 
                        type="text"
                        class="form-control @error('url') is-invalid @enderror" 
                        name="url" 
                        value="{{ old('url') ?? $user->profile->url }}"
                        required 
                        autocomplete="url"
                        autofocus>
                        
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Profile Image') }}</label>
                    <input type="file" class="form-control-file" id="image" name="image" />

                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="row" style="padding-top: 20px">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save Changes') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
