@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Theme Management</h2>
            </div>
            <div class="pull-right mb-3">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('themes.create') }}"> Create New Theme</a>
                @endcan
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>CDN URL</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($themes as $key => $theme)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $theme->name }}</td>
                <td>{{ $theme->cdn_url }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('themes.show',$theme->id) }}">Show</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('themes.edit',$theme->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['themes.destroy', $theme->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>

    {!! $themes->render() !!}

    <p class="text-center text-primary"><small>{{config('app.footer_title')}}</small></p>
@endsection
