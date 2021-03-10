@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                        {{ __('Recent Posts') }}
                        @auth
                        <a href="{{ route('posts.create') }}" class="btn btn-info float-right">Create new post</a>
                        @endauth
                    </h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
{{--{{ $user }}--}}
                    @foreach($posts as $post)
                        <div class="card mb-4">
                            <img class="card-img-top" src="{{$post->image_url}}" alt="Card image cap">
                            <div class="card-body">
                                <small>Posted {{$post->created_at->diffForHumans()}} by {{$post->creator->name}}</small>
                                @if($post->updated_at)
                                <small>[ Updated {{$post->updated_at->diffForHumans()}} ]</small>
                                @endif
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text">{{$post->description}}</p>
                                @auth
                                    @if($user->id === $post->created_by)
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                    @endif
                                    @if($user->id === $post->created_by || !$isModerator->isEmpty())
                                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    @endif
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
