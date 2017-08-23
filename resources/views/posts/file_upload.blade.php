@extends('layout')
@section('title', 'Post CSV Upload')
@section('content')
    @can('isAdmin')
    @if(Session::has('error'))
        <div class="alert-danger">
            <h2>{{ Session::get('error') }}</h2>
        </div>
    @endif

    @if ($errors->any())
        <ul class="uk-alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
  <h1>File Upload...... Fix Error reporting...</h1>
    {{--echo Form::open(array('action' => 'Controller@postUploadCsv','files' =>true))--}}
  {!! Form::open(array('url'=>'/posts/file_upload', 'files'=>true)) !!}
    {{--echo Form::open(array('url' => 'foo/bar', 'files' => true))--}}

    {{--{!! Form::open(['url' => '/posts', 'class' => '', 'files' =>true]) !!}--}}

          <input type="file" name="csv-file" id="csv-file"/>

  {{csrf_field()}}
    <br/>
    <br/>

  {!! Form::submit('Upload CSV', ['class' => 'btn btn-success form-control']) !!}

  {!! Form::close() !!}
    @else
        <?php header("Location: /"); die(); ?>

@endcan

@endsection