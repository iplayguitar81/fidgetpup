

@extends('layout')
@section('title', 'Contact Us')

@section('content')


    <div class="col-md-12">
        @if(Session::has('message'))
            <div class="alert alert-danger">
                {{Session::get('message')}}
            </div>
        @endif

        <h2 class="text-center article-title-show">contact us today!</h2>


        <ul>
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    <li>{{ $error }}</li>
                </div>
            @endforeach
        </ul>

        {!! Form::open(array('route' => 'contact_store', 'class' => 'uk-form uk-form-horizontal')) !!}

        <div class="form-group">
            {!! Form::label('Name') !!}
            {!! Form::text('name', null,
                array(
                      'class'=>'form-control',
                      'placeholder'=>'name')) !!}
        </div>
        <br/>
        <div class="form-group">
            {!! Form::label('E-mail') !!}
            {!! Form::text('email', null,
                array(
                      'class'=>'form-control',
                      'placeholder'=>'Your e-mail address')) !!}
        </div>
        <br/>
        <div class="form-group">
            {!! Form::label('Message') !!}<br/>
            {!! Form::textarea('message', null,
                array(
                      'class'=>'form-control',
                      'placeholder'=>'message')) !!}
        </div>
        <br/>
        <div class="form-group">
            {!! Form::submit('Contact Us!',
              array('class'=>'btn btn-danger form-control')) !!}
        </div>
        {!! Form::close() !!}
    </div>

@endsection


