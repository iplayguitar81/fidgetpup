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




    <article class="text-center">


        <h1 class="main-article-titles Ripper" >
            <a href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{ $item->title }}</a>
        </h1>
        <p class="subheader-main Bebas">{{ ucwords($item->subHead) }}</p>

        <p class="">Written by


            {{--@if($item->user_id != null)--}}
            {{--@php $author = App\User::find($item->user_id)->name; @endphp--}}

            {{--{{$author}}--}}
            {{--@endif--}}

            {{written_by($item->user_id)}}

            on {{ gameDate($item->created_at)}}</p>


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



       <p class="article-texterson">{{snippety($item->body)}} ...</p>

            <a class="btn btn-success btn-lg active" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">Continue Reading</a>

        <span type="submit" class="btn center-block btn-md" onclick="window.location='{{ route('posts.show', [$item->id, str_slug($item->title)]) }}/#fb-comments-show';" ><span class="count-icon"><i class="fa fa-3x fa-comment"></i> <span class="fb-comments-count" data-href="https://dev.fidgetspinnerdog.com/posts/{{$item->id}}/{{str_slug($item->title)}}"></span></span> Comments </span>

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


