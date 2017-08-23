@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Ratings <a href="{{ url('/ratings/create') }}" class="btn btn-primary btn-xs" title="Add New Rating"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('ratings.rating_id') }} </th><th> {{ trans('ratings.post_id') }} </th><th> {{ trans('ratings.contents') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($ratings as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->rating_id }}</td><td>{{ $item->post_id }}</td><td>{{ $item->contents }}</td>
                    <td>
                        <a href="{{ url('/ratings/' . $item->id) }}" class="btn btn-success btn-xs" title="View Rating"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/ratings/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Rating"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/ratings', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Rating" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Rating',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $ratings->render() !!} </div>
    </div>

</div>
@endsection
