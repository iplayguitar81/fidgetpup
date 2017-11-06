@extends('layout')
@section('title', 'Edit '.$post->title)
@section('content')

    @can('isAdmin')

        <div class="col-md-12">

    <h1 class="article-title-show">Edit Post</h1>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif



    {!! Form::model($post, [
        'method' => 'PATCH',
        'url' => ['/posts', $post->id],
        'class' => '','files' => true
    ]) !!}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', trans('posts.title'), ['class' => 'control-label']) !!}
                <div class="">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
    <br/>

        <div class="form-group {{ $errors->has('subHead') ? 'has-error' : ''}}">
            {!! Form::label('subHead', trans('posts.subhead'), ['class' => '']) !!}
            <div class="">
                {!! Form::text('subHead', null, ['class' => 'form-control']) !!}
                {!! $errors->first('subHead', '<p class="">:message</p>') !!}
            </div>
        </div>

            <br/>
            <br/>
            <div class="form-group {{ $errors->has('mainImg_caption') ? 'has-error' : ''}}">
                {!! Form::label('mainImg_caption', trans('posts.mainImg_caption'), ['class' => '']) !!}
                <div class="">
                    {!! Form::text('mainImg_caption', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('mainImg_caption', '<p class="uk-alert-danger">:message</p>') !!}
                </div>
            </div>
            <br/>
            <br/>


            <div class="form-group {{ $errors->has('main_article') ? 'has-error' : ''}}">
                {!! Form::label('main_article', trans('posts.main_article'), ['class' => '']) !!}
                <div class="">
                    {{Form::hidden('main_article', 0)}}
                    {{Form::checkbox('main_article', 1, $post->main_article, ['class' => 'switch', 'data-on-text'=>"1", 'data-off-text'=>"0"])}}
                    {!! $errors->first('main_article', '<p class="uk-alert-danger">:message</p>') !!}
                </div>
            </div>
            <br/>


            <div class="form-group {{ $errors->has('published') ? 'has-error' : ''}}">
                {!! Form::label('published', trans('posts.published'), ['class' => '']) !!}
                <div class="">
                    {{Form::hidden('published', 0)}}
                    {{Form::checkbox('published', 1, $post->published, ['class' => 'switch', 'data-on-text'=>"1", 'data-off-text'=>"0"])}}
                    {!! $errors->first('published', '<p class="uk-alert-danger">:message</p>') !!}
                </div>
            </div>
            <br/>

            <div class="form-group">
                {!! Form::label('category', trans('posts.category'), ['class' => '']) !!}

                {{ Form::select('category', [
               'buddy-videos' => 'Buddy Videos',
               'buddy-news' => 'Buddy News',
               'pet-tricks' => 'Pet Tricks',
               'comedy' => 'Comedy'

               ]
            ) }}

            </div>
            <br/>
            <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
                {!! Form::label('body', trans('posts.body'), ['class' => '']) !!}
                <div class="">
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            {{--<div class="form-group {{ $errors->has('imgPath') ? 'has-error' : ''}}">--}}
                {{--{!! Form::label('imgPath', trans('posts.imgPath'), ['class' => 'col-sm-3 control-label']) !!}--}}
                {{--<div class="col-sm-6">--}}
                    {{--{!! Form::text('imgPath', null, ['class' => 'form-control']) !!}--}}
                    {{--{!! $errors->first('imgPath', '<p class="help-block">:message</p>') !!}--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="form-group {{ $errors->has('videoPath') ? 'has-error' : ''}}">
                {!! Form::label('videoPath', trans('posts.videoPath'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="">
                    {!! Form::text('videoPath', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('videoPath', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <br/>

            <br/>

<br/>
    <label>Current Main Article Image:</label>
    <img class="img-responsive thumbnail" src="../../images/{{ $post->imgPath}}">

        <br/>
    <label>Update Lead Image</label>
        <div class="form-group">
            <div class="">
                <input type="file" name="file" id="file" onchange="readURL(this);"/>
            </div>
        </div>
        <br/>
        {{csrf_field()}}

        <div id="blah2">
            <img id="blah" class="img-responsive thumbnail" src="#" alt="uploaded image">
        </div>


        <div class="form-group {{ $errors->has('imgPath') ? 'has-error' : ''}}">
            {!! Form::label('imgPath', trans('posts.imgPath'), ['class' => 'col-sm-3 control-label img_string']) !!}
            <div class="">
                {!! Form::text('imgPath', null, ['class' => 'form-control filename']) !!}
                {!! $errors->first('imgPath', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <br/>
        <br/>


<br/>

    <div class="form-group">
        <div class="">
            {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
        </div>
    </div>
    {!! Form::close() !!}

<div class="row">
<div class="col-md-12">
    <h4>Upload Article Gallery Images</h4>
    <p>Drag &amp; Drop images to the box below or click on it to open your computer's file dialog.</p>

    <form action="{{url('do-upload')}}"
    class="dropzone" id="addImages">

    {{csrf_field()}}
<input type="hidden" name="gallery_id" value="{{$post->id}}">

    </form>
</div>

</div>

            <h4>Uploaded Article Gallery Images</h4>
            {{--{{$post->images}}--}}

            <div class="row">

                <div class="col-md-12">

                    <div id="gallery-images">

                        <ul>
                            @foreach($post->images as $image)

                                <li>
                                    <a href="{{url($image->file_path)}}" target="_blank">
                                        <img src="{{url($image->file_path)}}">
                                        {{--@if($image->user_id == $user)--}}

                                    </a>
                                    <br/>

                                    <br/>

                                        {{--Please Enter Caption Below &amp; Submit!--}}
                                    <div class="panel panel-default"><div class="panel-body">

                                        @if($image->caption== null)

                                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="{{'#'.$image->id}}">Add Caption</button>
                                        <div id="{{$image->id}}" class="collapse">
                                        {{ Form::open(['route' => ['My.route2', $image->id], 'method' => 'post']) }}
                                        <br/>
                                            {{ Form::hidden('post_id', $post->id ) }}
                                        {!! Form::textarea('caption', null, ['class' => 'text-area', 'size' => '30x3']) !!}
                                        {{--{!! Form::submit(Auth::user()->name.' - -Delete Image', ['class' => 'btn btn-danger']) !!}--}}
                                        {{--@endif--}}
                                        <br/>
                                        {!! Form::submit('Save Caption', ['class' => 'btn btn-success']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                            @else

                                        <h6>Image Caption:</h6><p>{{$image->caption}}</p></div>



                                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="{{'#'.$image->id}}">Edit Caption</button>
                                        <div id="{{$image->id}}" class="collapse">
                                            {{ Form::open(['route' => ['My.route2', $image->id], 'method' => 'post']) }}
                                            <br/>
                                            {{ Form::hidden('post_id', $post->id ) }}
                                            {!! Form::textarea('caption', $image->caption, ['class' => 'text-area', 'size' => '30x3']) !!}
                                            {{--{!! Form::submit(Auth::user()->name.' - -Delete Image', ['class' => 'btn btn-danger']) !!}--}}
                                            {{--@endif--}}
                                            <br/>
                                            {!! Form::submit('Edit Caption', ['class' => 'btn btn-success']) !!}
                                            {!! Form::close() !!}
                                        </div>


                                        @endif



                                    <br/>
                                    <br/>

                                    {{ Form::open(['route' => ['My.route', $image->id], 'method' => 'delete']) }}
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                    {{--{!! Form::submit(Auth::user()->name.' - -Delete Image', ['class' => 'btn btn-danger']) !!}--}}
                                    {{--@endif--}}

                                    {!! Form::close() !!}
                                    </div>

                                </li>
                            @endforeach


                        </ul>

                    </div>

                </div>

            </div>

<br/>
<br/>

    <a href="{{url('posts')}}">

        <button type="submit" class="btn btn-success btn-md active">Back to All Posts</button>
    </a>

    @else <?php header("Location: /"); die(); ?>

    @endcan
</div>

@endsection


<script src="{{url('/js/jquery.js')}}"></script>
<script src="{{url('/js/image_upload.js')}}"></script>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
    tinymce.init({ mode : 'specific_textareas', plugins: 'media, link', editor_selector : 'form-control' });

</script>

