@extends('layout')

@section('title', 'Map Laravel Test')


@section('content')


@if($results_empty)
        <div class="alert alert-info">
            <span class="glyphicon glyphicon-exclamation-sign"></span>
            No Results for '{{$search}}' Query Try A Different Search!!!!!!!
        </div>



@else
    <h1 class="article-title-show">Search Results</h1>
    <h3 class="text-center">Showing Results for '{{$search}}'.....</h3>

    <div class="container">
    @foreach($results2 as $result)

        <div class="row">
            <div class="col-sm-9">
                <h2 class="secondary-posts-title text-center"><a class="" href="{{ route('posts.show', [$result->id, str_slug($result->title)]) }}">{{ ucwords($result->title)}}</a></h2>
                <br/><span class="text-muted text-center">{{$result->subHead}}</span>
                <div class="row">

                <div class="col-8 col-sm-6">
                @if( $result->videoPath !=null)
                    <div class="video-container">
                        {!! $result->videoPath !!}
                    </div>
                @else
                    <img src="../images/md-img-{{ $result->imgPath}}" class="img-responsive">
                @endif
                <br/>
                <span>{{$result->mainImg_caption}}</span>
            </div>
            <div class="col-4 col-sm-6">




                <p class="text-muted">Written by <a href="#">{{written_by($result->user_id)}}</a> on {{gameDate($result->created_at)}} </p>


                <p>{{snippety($result->body)}}...<a class="" href="{{ route('posts.show', [$result->id, str_slug($result->title)]) }}">READ MORE</a></p>


            </div>
                </div>
            </div>
        </div>
            <br/>
            <hr/>

        <br/>


    @endforeach
    </div>

    <div class="pagination">{!! $results2->render() !!}</div>

@endif



@endsection