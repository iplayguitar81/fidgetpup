@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Post-images <a href="{{ url('/post-images/create') }}" class="btn btn-primary btn-xs" title="Add New Post-image"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('post-images.post_image_id') }} </th><th> {{ trans('post-images.post_id') }} </th><th> {{ trans('post-images.img_path') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($post-images as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->post_image_id }}</td><td>{{ $item->post_id }}</td><td>{{ $item->img_path }}</td>
                    <td>
                        <a href="{{ url('/post-images/' . $item->id) }}" class="btn btn-success btn-xs" title="View Post-image"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/post-images/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Post-image"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/post-images', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Post-image" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Post-image',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $post-images->render() !!} </div>
    </div>

</div>
@endsection
