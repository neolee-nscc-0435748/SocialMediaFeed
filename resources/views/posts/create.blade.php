@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                        {{ __('Create new post') }}
                    </h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(array('route' => 'posts.store','method'=>'POST')) !!}
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Please enter a Post Title" value="{{ old('title') }}">
                            @error('title')
                            <small id="validationResult" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image_url">Image URL</label>
                            <input type="text" class="form-control" id="image_url" name="image_url" placeholder="Please enter a Image link" value="{{ old('image_url') }}">
                            @error('image_url')
                            <small id="validationResult" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Please enter a description for the post" value="{{ old('description') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-outline-primary" href="{{ route('posts.index') }}"> Cancel</a>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
