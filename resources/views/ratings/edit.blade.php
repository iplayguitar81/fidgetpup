@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Rating {{ $rating->id }}</h1>

    {!! Form::model($rating, [
        'method' => 'PATCH',
        'url' => ['/ratings', $rating->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('rating_id') ? 'has-error' : ''}}">
                {!! Form::label('rating_id', trans('ratings.rating_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('rating_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('rating_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('post_id') ? 'has-error' : ''}}">
                {!! Form::label('post_id', trans('ratings.post_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('post_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('post_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('contents') ? 'has-error' : ''}}">
                {!! Form::label('contents', trans('ratings.contents'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('contents', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('contents', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('rater_email') ? 'has-error' : ''}}">
                {!! Form::label('rater_email', trans('ratings.rater_email'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('rater_email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('rater_email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('rating') ? 'has-error' : ''}}">
                {!! Form::label('rating', trans('ratings.rating'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('rating', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('rating', '<p class="help-block">:message</p>') !!}
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