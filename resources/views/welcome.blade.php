

@extends('layout')
@section('title', 'Home')

@section('content')



<div class="col-md-8">

    @if(Session::has('message'))
        <div class="alert alert-info" style="color:red;">
            {{Session::get('message')}}
        </div>
    @endif


    @foreach($main as $item)

        @php
        $game_date = new DateTime($item->created_at, new DateTimeZone('America/Los_Angeles'));
        $game_date = date_sub($game_date, date_interval_create_from_date_string('3 hour'));
        $game_date = $game_date->format('M jS Y');
        @endphp

    <article class="text-center">


        <h1 class="main-article-titles Ripper" >
            <a href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{ $item->title }}</a>
        </h1>
        <p class="subheader-main Bebas">{{ ucwords($item->subHead) }}</p>
        {{--{{$posts-> $item->user }}--}}

        {{--{{//$users::where('id','like',$item->user_id) -> name()}}--}}
        <p class="">Written by


            @if($item->user_id != null)
            @php $author = App\User::find($item->user_id)->name; @endphp

            {{$author}}
            @endif


            on {{ $game_date }}</p>


        @if( $item->videoPath !=null)
        <p>{!! $item->videoPath !!}</p>


        @else
        <p>
            <a href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"><img class="img-responsive center-block" src="../images/{{ $item->imgPath}}"></a>
        </p>
        @endif

        {{--*/ @ $rate_sum = 0; $rate_count=0; $rate_avg=0; $rate_pct=0;  /*--}}


        {{--@foreach($ratings as $rating)--}}
        {{--@if($rating->post_id ==$item->id)--}}

     {{--*/ @ $rate_sum+=$rating->rating; $rate_count++; $rate_avg=$rate_sum/$rate_count; $rate_pct=($rate_avg/5)*100 /*--}}
            {{----}}

            {{--<p>{{$rating->rating}}</p>--}}
            {{--<p>{{$rating->rate_message}}</p>--}}

            {{--@else--}}


            {{--@endif--}}


        {{--@endforeach--}}


        {{--<div class="row">--}}
            {{--<div class="col-md-8">--}}

                {{--{{'Rating Avg: '.round($rate_avg,2)}}/5--}}
                {{--<br/>--}}
                {{--{{'# of Ratings: '.$rate_count}}--}}

                {{--<div class="rating center-block"><div class="stars"></div><div class="back" style="width:{{$rate_pct}}%;"></div></div>--}}


            {{--</div>--}}

        {{--</div>--}}





        {{--<p>Average Rating: {{$ratings->averageRating}}</p>--}}
        {{--<p>Rating %: {{$ratings->ratingPercent}}</p>--}}


@php

            $variable= strip_tags($item->body);
            $variable =substr($variable,0, 150);
       // $variable = (str_limit($item->body, 100));
       // $variable= htmlentities($variable);
  @endphp

       <p class="article-texterson">{{$variable}} ...</p>
      {{--<p>  {{strip_tags((str_limit($item->body, 100)))}}...</p>--}}
            <a class="btn btn-success btn-lg active" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">Continue Reading</a>

        <span type="submit" class="btn center-block btn-md" onclick="window.location='{{ route('posts.show', [$item->id, str_slug($item->title)]) }}/#fb-comments-show';" ><span class="count-icon"><i class="fa fa-2x fa-comment"></i> <span class="fb-comments-count" data-href="https://dev.fidgetspinnerdog.com/posts/{{$item->id}}/{{str_slug($item->title)}}"></span></span> Comments </span>

        <br/>
        <br/>

        <hr>
    </article>

    @endforeach


            <h2 class="Bebas text-center"><a href="{{ route('posts.news') }}">More Stories...</a></h2>





        <br/>


</div>
<br/>

<br/>

<div class="col-md-4 col-pull-4">
    @include('sidebar')
</div>


@endsection
<script src="{{url('https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js')}}"></script>
<script src="{{url('/js/lightslider.js')}}"></script>
<script>

    $(document).ready(function() {
        $("#content-slider").lightSlider({
            loop:true,
            keyPress:true
        })});






</script>


