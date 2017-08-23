@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Post-image {{ $post-image->id }}</h1>

    {!! Form::model($post-image, [
        'method' => 'PATCH',
        'url' => ['/post-images', $post-image->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('post_image_id') ? 'has-error' : ''}}">
                {!! Form::label('post_image_id', trans('post-images.post_image_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('post_image_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('post_image_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('post_id') ? 'has-error' : ''}}">
                {!! Form::label('post_id', trans('post-images.post_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('post_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('post_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('img_path') ? 'has-error' : ''}}">
                {!! Form::label('img_path', trans('post-images.img_path'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('img_path', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('img_path', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection