

@extends('layout')
@section('title', 'Home')

@section('content')



<div class="col-md-8">



    {{--<h2 id="latest_games" class="Ripper">latest games</h2>--}}

    {{--<div id="owl-demo" class="owl-carousel owl-theme">--}}
        {{--@foreach($scores as $item)--}}

            {{--@php--}}
                {{--$versus_or_at="";--}}
                {{--$away_nick_dash="$item->afname";--}}
                {{--$home_nick_dash="";--}}
                {{--$home_or_away="";--}}
                {{--$win_or_loss="";--}}

        {{--$game_date = new DateTime($item->datey, new DateTimeZone('America/Los_Angeles'));--}}
        {{--$game_date = date_sub($game_date, date_interval_create_from_date_string('3 hour'));--}}
        {{--$game_date = $game_date->format('M jS Y');--}}


            {{--@endphp--}}



            {{--@if ($item->h_initials=='POR')--}}
                {{--@php--}}
                    {{--$versus_or_at="VS.";--}}
                {{--@endphp--}}

                {{--@if($item->htotal > $item->atotal)--}}
                    {{--@php--}}
                        {{--$win_or_loss ="<span class='win_loss_box_show_win2'>W</span>";--}}

                    {{--@endphp--}}
                {{--@else--}}
                    {{--@php--}}
                        {{--$win_or_loss ="";--}}
                    {{--@endphp--}}
                {{--@endif--}}
                {{--@if($item->htotal < $item->atotal)--}}
                    {{--@php--}}
                        {{--$win_or_loss ="<span class='win_loss_box_show_loss2'>L</span>";--}}

                    {{--@endphp--}}


                {{--@endif--}}

                {{--@php--}}
                    {{--$home_or_away = $item->afname.'<span class="box_total_h2"> '.$item->atotal+"</span><br/>at<br/> portland trail blazers <span class='box_total_h2'>".$item->htotal."</span>";--}}
                {{--@endphp--}}


            {{--@endif--}}


            {{--@if ($item->a_initials=='POR')--}}
                {{--@php--}}
                    {{--$versus_or_at="@";--}}
                {{--@endphp--}}

                {{--@if($item->atotal > $item->htotal)--}}
                    {{--@php--}}
                        {{--$win_or_loss ="<span class='win_loss_box_show_win2'>W</span>";--}}

                    {{--@endphp--}}
                {{--@else--}}
                    {{--@php--}}
                        {{--$win_or_loss ="";--}}
                    {{--@endphp--}}
                {{--@endif--}}
                {{--@if($item->atotal < $item->htotal)--}}
                    {{--@php--}}
                        {{--$win_or_loss ="<span class='win_loss_box_show_loss2'>L</span>";--}}

                    {{--@endphp--}}


                {{--@endif--}}

                {{--@php--}}
                    {{--$home_or_away = 'portland trailblazers'.'<span class="box_total_h2"> '.$item->atotal+"</span><br/>at<br/>'.$item->hfname.'<span class='box_total_h2'>".$item->htotal."</span>";--}}
                {{--@endphp--}}


            {{--@endif--}}




            {{--<div class="item">--}}

                {{--<table class="header_last_game">--}}
                    {{--<tr><th colspan="3">{{$game_date}}</th></tr>--}}
                    {{--<tr><td><span class="initials">{{$item->a_initials}}</span><br/><span class='slider_score'>{{$item->atotal}}</span></td><td>{!! $versus_or_at !!}<br/>{!! $win_or_loss!!}</td><td><span class="initials">{{$item->h_initials}}</span><br/><span class='slider_score'>{{$item->htotal}}</span></td></tr>--}}
                    {{--<tr><td colspan="3" class="score-link"><a class="btn btn-danger btn-xs" role="button" aria-pressed="true" href="{{ route('boxscores.show', [$item->id, str_slug($item->game_string)]) }}">Box score</a></td></tr>--}}
                {{--</table>--}}


            {{--</div>--}}




        {{--@endforeach--}}
    {{--</div>--}}



    <br/>

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
        <p class="subheader-main Bebas">{{ $item->subHead}}</p>
        {{--{{$posts-> $item->user }}--}}

        {{--{{//$users::where('id','like',$item->user_id) -> name()}}--}}
        <p class="">Written by


            @if($item->user_id != null)
            @php $author = App\User::find($item->user_id)->name; @endphp

            {{$author}}
            @endif


            on {{ $game_date }}</p>

        <p>
            <a href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"><img class="img-responsive center-block" src="../images/{{ $item->imgPath}}"></a>
        </p>

        {{--*/ @ $rate_sum = 0; $rate_count=0; $rate_avg=0; $rate_pct=0;  /*--}}


        @foreach($ratings as $rating)
        @if($rating->post_id ==$item->id)

     {{--*/ @ $rate_sum+=$rating->rating; $rate_count++; $rate_avg=$rate_sum/$rate_count; $rate_pct=($rate_avg/5)*100 /*--}}




            {{--<p>{{$rating->rating}}</p>--}}
            {{--<p>{{$rating->rate_message}}</p>--}}

            @else


            @endif


        @endforeach


        <br/>


        {{--<div class="row">--}}
            {{--<div class="col-md-8">--}}

                {{--{{'Rating Avg: '.round($rate_avg,2)}}/5--}}
                {{--<br/>--}}
                {{--{{'# of Ratings: '.$rate_count}}--}}

                {{--<div class="rating center-block"><div class="stars"></div><div class="back" style="width:{{$rate_pct}}%;"></div></div>--}}


            {{--</div>--}}

        {{--</div>--}}

        <br/>

<?//$ratings= $ratings($item->id)?>

        {{--<p>Average Rating: {{$ratings->averageRating}}</p>--}}
        {{--<p>Rating %: {{$ratings->ratingPercent}}</p>--}}

{{--{{$variable = str_limit($item->body, 100)}}--}}
   <?

            $variable= strip_tags($item->body);
            $variable =substr($variable,0, 150);
       // $variable = (str_limit($item->body, 100));
       // $variable= htmlentities($variable);
        ?>
       <p class="article-texterson">{{$variable}} ...</p>
      {{--<p>  {{strip_tags((str_limit($item->body, 100)))}}...</p>--}}
            <a class="btn btn-danger btn-md active" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">Continue Reading</a>

        <button type="submit" class="btn center-block btn-md" onclick="window.location='{{ route('posts.show', [$item->id, str_slug($item->title)]) }}/#fb-comments-show';" >Comments</button>

        <hr>

    </article>

    @endforeach

<br/>








        <h2 id="latest_games" class="Ripper">trail blazers news</h2>




        <div class="row">

            @foreach($posts as $item)

                @unless($item->main_article == 1)

                    @php
                        $game_date = new DateTime($item->created_at, new DateTimeZone('America/Los_Angeles'));
                        $game_date = date_sub($game_date, date_interval_create_from_date_string('3 hour'));
                        $game_date = $game_date->format('M jS Y');
                    @endphp
        <div class="col-xs-12 col-sm-6 col-lg-6">

            <div class="thumbnail">

                <div class="text-center">
                    @if($item->category ==="news")

                        <a class="btn-xs btn-danger text-center" href="{{url('news/general')}}">#{{$item->category}}</a>

                    @elseif($item->category ==="retro")
                        <a class="btn-xs btn-danger text-center" href="{{url('news/retro')}}">#{{$item->category}}</a>

                    @elseif($item->category ==="former_players")
                        <a class="btn-xs btn-danger text-center" href="{{url('news/former-players')}}">#{{$item->category}}</a>

                    @elseif($item->category ==="nba")
                        <a class="btn-xs btn-danger text-center" href="{{url('news/nba')}}">#{{$item->category}}</a>

                    @endif
                </div>

                <img src="../images/md-img-{{ $item->imgPath}}" alt="">
                <div class="caption">
                    <em class="caption-em">{{$item->mainImg_caption}}</em>
                    <h2 class="secondary-posts-title text-center"><a href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{$item->title}}</a></h2>
                    <em>Written By: <a href="#">   @if($item->user_id != null)
                                <? $author = App\User::find($item->user_id)->name; ?>

                                {{$author}}
                            @endif
                        </a> on {{$game_date}}</em>

                    @php
                        $variable= strip_tags($item->body);
                        $variable =substr($variable,0, 50);
                    @endphp

                    <p class="second-art-snip">

                        {{$variable}}...<a class="pull-right" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">READ MORE</a>
                        <br/>
                        </p>



                    <br/>
                </div>
            </div>
        </div>


                @endunless
            @endforeach
            <h2 class="Bebas text-center"><a href="{{ route('posts.news') }}">More Articles...</a></h2>

        </div>





        <br/>


</div>
<br/>

<br/>

<div class="col-md-3 col-pull-3">
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


