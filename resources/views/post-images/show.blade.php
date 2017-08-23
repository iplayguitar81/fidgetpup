@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Post-image {{ $post-image->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $post-image->id }}</td>
                </tr>
                <tr><th> {{ trans('post-images.post_image_id') }} </th><td> {{ $post-image->post_image_id }} </td></tr><tr><th> {{ trans('post-images.post_id') }} </th><td> {{ $post-image->post_id }} </td></tr><tr><th> {{ trans('post-images.img_path') }} </th><td> {{ $post-image->img_path }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('post-images/' . $post-image->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Post-image"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['post-images', $post-image->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Post-image',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
@endsection