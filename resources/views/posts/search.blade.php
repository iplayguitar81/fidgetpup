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
    <p>Showing Results for '{{$search}}'.....</p>

    <div class="container">
    @foreach($results2 as $result)

        <div class="row justify-content-md-center">
            <div class="col-sm-4"><a class="" href="{{ route('posts.show', [$result->id, str_slug($result->title)]) }}"></a>
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
            <div class="col-sm-8">


                <h2 class="secondary-posts-title"><a class="" href="{{ route('posts.show', [$result->id, str_slug($result->title)]) }}">{{ ucwords($result->title)}}</a></h2>
                <p class="text-muted">{{$result->subHead}}</p>
                <p class="text-muted">Written by <a href="#">{{written_by($result->user_id)}}</a> on {{gameDate($result->created_at)}} </p>


                <p>{{snippet($result->body)}}...<a class="" href="{{ route('posts.show', [$result->id, str_slug($result->title)]) }}">READ MORE</a></p>


            </div>
            <br/>
            <hr/>
    </div>
        <br/>


    @endforeach
    </div>

    <div class="pagination">{!! $results2->render() !!}</div>

@endif



@endsection