@extends('layout')
@section('title', 'Buddy Videos')
@section('content')

    <h1 class="article-title-show">buddy videos</h1>
    <p class="text-center">Here you can check out all the latest buddy the balancing wonder dog videos!</p>
    <hr>

    @foreach($news as $item)


        <div class="col-sm-4"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"><img src="../images/md-img-{{ $item->imgPath}}" class="img-responsive"></a>
            <br/>
            <span>{{$item->mainImg_caption}}</span>
        </div>
        <div class="col-sm-8">
            <h2 class="secondary-posts-title"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{ ucwords($item->title)}}</a></h2>
            <p class="text-muted">{{$item->subHead}}</p>
            <p class="text-muted">Written by <a href="#">{{written_by($item->user_id)}}</a> on {{gameDate($item->created_at)}} </p>
            <p>{{snippet($item->body)}}...<a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">READ MORE</a></p>
        </div>


        <hr/>
    @endforeach

    <br/>

    <div class="buttons-show">
        <button type="submit" class="btn btn-success center-block btn-md" onclick="window.location='{{url('/news')}}';" >Back to All News</button>
    </div>

@endsection
