
<div id="owl-demo" class="owl-carousel owl-theme">
    @foreach($scores as $item)

        @php
            $versus_or_at="";
            $away_nick_dash="$item->afname";
            $home_nick_dash="";
            $home_or_away="";
            $win_or_loss="";
            $ateam_color= "";
            $hteam_color= "";



    $game_date = new DateTime($item->datey, new DateTimeZone('America/Los_Angeles'));
    $game_date = date_sub($game_date, date_interval_create_from_date_string('3 hour'));
    $game_date = $game_date->format('M jS Y');


        @endphp



        @if ($item->h_initials=='POR')
            @php
                $versus_or_at="VS.";
            @endphp

            @if($item->htotal > $item->atotal)
                @php
                    $win_or_loss ="<span class='win_loss_box_show_win2'>W</span>";

                @endphp
            @else
                @php
                    $win_or_loss ="";
                @endphp
            @endif
            @if($item->htotal < $item->atotal)
                @php
                    $win_or_loss ="<span class='win_loss_box_show_loss2'>L</span>";

                @endphp


            @endif

            @php
                $home_or_away = $item->afname.'<span class="box_total_h2"> '.$item->atotal+"</span><br/>at<br/> portland trail blazers <span class='box_total_h2'>".$item->htotal."</span>";
            @endphp


        @endif


        @if ($item->a_initials=='POR')
            @php
                $versus_or_at="@";
            @endphp

            @if($item->atotal > $item->htotal)
                @php
                    $win_or_loss ="<span class='win_loss_box_show_win2'>W</span>";

                @endphp
            @else
                @php
                    $win_or_loss ="";
                @endphp
            @endif
            @if($item->atotal < $item->htotal)
                @php
                    $win_or_loss ="<span class='win_loss_box_show_loss2'>L</span>";

                @endphp


            @endif

            @php
                $home_or_away = 'portland trailblazers'.'<span class="box_total_h2"> '.$item->atotal+"</span><br/>at<br/>'.$item->hfname.'<span class='box_total_h2'>".$item->htotal."</span>";
            @endphp


        @endif



    @if( $item->a_initials =='POR'   )

            @php
                $ateam_color= "portland"

            @endphp


        @elseif($item->h_initials =='POR')

            @php
                $hteam_color= "portland"

            @endphp

        @endif


        @if(($item->a_initials =='ATL'))

            @php
                $ateam_color= "atlanta"

            @endphp

        @elseif($item->h_initials =='ATL')
            @php
                $hteam_color= "atlanta"

            @endphp

        @endif


        @if(($item->a_initials =='BOS'))

            @php
                $ateam_color= "boston"

            @endphp

        @elseif($item->h_initials =='BOS')
            @php
                $hteam_color= "boston"

            @endphp

        @endif


        @if(($item->a_initials =='BKN'))

            @php
                $ateam_color= "brooklyn"

            @endphp

        @elseif($item->h_initials =='BKN')
            @php
                $hteam_color= "brooklyn"

            @endphp

        @endif


        @if(($item->a_initials =='CHA'))

            @php
                $ateam_color= "charlotte"

            @endphp

        @elseif($item->h_initials =='CHA')
            @php
                $hteam_color= "charlotte"

            @endphp

        @endif



        @if(($item->a_initials =='CHI'))

            @php
                $ateam_color= "chicago"

            @endphp

        @elseif($item->h_initials =='CHI')
            @php
                $hteam_color= "chicago"

            @endphp

        @endif



        @if(($item->a_initials =='CLE'))

            @php
                $ateam_color= "cleveland"

            @endphp

        @elseif($item->h_initials =='CLE')
            @php
                $hteam_color= "cleveland"

            @endphp

        @endif



        @if(($item->a_initials =='DAL'))

            @php
                $ateam_color= "dallas"

            @endphp

        @elseif($item->h_initials =='DAL')
            @php
                $hteam_color= "dallas"

            @endphp

        @endif


        @if(($item->a_initials =='DEN'))

            @php
                $ateam_color= "denver"

            @endphp

        @elseif($item->h_initials =='DEN')
            @php
                $hteam_color= "denver"

            @endphp

        @endif


        @if(($item->a_initials =='DET'))

            @php
                $ateam_color= "detroit"

            @endphp

        @elseif($item->h_initials =='DET')
            @php
                $hteam_color= "detroit"

            @endphp

        @endif




@if(($item->a_initials =='GS'))

            @php
                $ateam_color= "golden-state"

            @endphp

        @elseif($item->h_initials =='GS')
            @php
                $hteam_color= "golden-state"

            @endphp

    @endif


        @if(($item->a_initials =='HOU'))

            @php
                $ateam_color= "houston"

            @endphp

        @elseif($item->h_initials =='HOU')
            @php
                $hteam_color= "houston"

            @endphp

        @endif


        @if(($item->a_initials =='IND'))

            @php
                $ateam_color= "indiana"

            @endphp

        @elseif($item->h_initials =='IND')
            @php
                $hteam_color= "indiana"

            @endphp

        @endif




        {{--los-angeles_lakers--}}


        @if(($item->a_initials =='LAL'))

            @php
                $ateam_color= "los-angeles_lakers"

            @endphp

        @elseif($item->h_initials =='LAL')
            @php
                $hteam_color= "los-angeles_lakers"

            @endphp

        @endif




        @if(($item->a_initials =='LAC'))

            @php
                $ateam_color= "los-angeles_clippers"

            @endphp

        @elseif($item->h_initials =='LAC')
            @php
                $hteam_color= "los-angeles_clippers"

            @endphp

        @endif


        @if(($item->a_initials =='MEM'))

            @php
                $ateam_color= "memphis"

            @endphp

        @elseif($item->h_initials =='MEM')
            @php
                $hteam_color= "memphis"

            @endphp

        @endif


        @if(($item->a_initials =='MIA'))

            @php
                $ateam_color= "miami"

            @endphp

        @elseif($item->h_initials =='MIA')
            @php
                $hteam_color= "miami"

            @endphp

        @endif


        @if(($item->a_initials =='MIL'))

            @php
                $ateam_color= "milwaukee"

            @endphp

        @elseif($item->h_initials =='MIL')
            @php
                $hteam_color= "milwaukee"

            @endphp

        @endif


        @if(($item->a_initials =='MIN'))

            @php
                $ateam_color= "minnesota"

            @endphp

        @elseif($item->h_initials =='MIN')
            @php
                $hteam_color= "minnesota"

            @endphp

        @endif



        @if(($item->a_initials =='NO'))

            @php
                $ateam_color= "new-orleans"

            @endphp

        @elseif($item->h_initials =='NO')
            @php
                $hteam_color= "new-orleans"

            @endphp

        @endif


        @if(($item->a_initials =='NY'))

            @php
                $ateam_color= "new-york"

            @endphp

        @elseif($item->h_initials =='NY')
            @php
                $hteam_color= "new-york"

            @endphp

        @endif



        @if(($item->a_initials =='OKC'))

            @php
                $ateam_color= "oklahoma-city"

            @endphp

        @elseif($item->h_initials =='OKC')
            @php
                $hteam_color= "oklahoma-city"

            @endphp

        @endif



        @if(($item->a_initials =='ORL'))

            @php
                $ateam_color= "orlando"

            @endphp

        @elseif($item->h_initials =='ORL')
            @php
                $hteam_color= "orlando"

            @endphp

        @endif



        @if(($item->a_initials =='PHI'))

            @php
                $ateam_color= "philadelphia"

            @endphp

        @elseif($item->h_initials =='PHI')
            @php
                $hteam_color= "philadelphia"

            @endphp

        @endif


        @if(($item->a_initials =='PHO'))

            @php
                $ateam_color= "phoenix"

            @endphp

        @elseif($item->h_initials =='PHO')
            @php
                $hteam_color= "phoenix"

            @endphp

        @endif

        {{--san-antonio--}}

        @if(($item->a_initials =='SA'))

            @php
                $ateam_color= "san-antonio"

            @endphp

        @elseif($item->h_initials =='SA')
            @php
                $hteam_color= "san-antonio"

            @endphp

        @endif



        @if(($item->a_initials =='SAC'))

            @php
                $ateam_color= "sacramento"

            @endphp

        @elseif($item->h_initials =='SAC')
            @php
                $hteam_color= "sacramento"

            @endphp

        @endif



        @if(($item->a_initials =='TOR'))

            @php
                $ateam_color= "toronto"

            @endphp

        @elseif($item->h_initials =='TOR')
            @php
                $hteam_color= "toronto"

            @endphp

        @endif


        @if(($item->a_initials =='UTA'))

            @php
                $ateam_color= "utah"

            @endphp

        @elseif($item->h_initials =='UTA')
            @php
                $hteam_color= "utah"

            @endphp

        @endif

        @if(($item->a_initials =='WAS'))

            @php
                $ateam_color= "washington"

            @endphp

        @elseif($item->h_initials =='WAS')
            @php
                $hteam_color= "washington"

            @endphp

        @endif



        <div class="item">

            <table class="header_last_game">
                <tr><th colspan="3">{{$game_date}}</th></tr>
                <tr><td><span class="initials {{$ateam_color}}">{{$item->a_initials}}</span><br/><span class='slider_score'>{{$item->atotal}}</span></td><td>{!! $versus_or_at !!}<br/>{!! $win_or_loss!!}</td><td><span class="initials {{$hteam_color}}">{{$item->h_initials}}</span><br/><span class='slider_score'>{{$item->htotal}}</span></td></tr>
                <tr><td colspan="3" class="score-link"><a class="btn btn-danger btn-xs" role="button" aria-pressed="true" href="{{ route('boxscores.show', [$item->id, str_slug($item->game_string)]) }}">Box score</a></td></tr>
            </table>


        </div>




    @endforeach
</div>
<br/>
<hr>

{{--<h3 class="Bebas">Welcome to Trail Blazers Fans.com</h3>--}}
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
{{--<br/>--}}




{{--<hr>--}}
        <div class="panel text-center">
            <div class="panel-heading">
                <h3 class="panel-title">Season Box Scores</h3></div>
            <ul class="list-group">
                <li class="list-group-item"> <a href="{{url('boxscores/season_2015_2016')}}">2015-2016 Season</a></li>
                <li class="list-group-item"><a href="{{url('boxscores/season_2014_2015')}}">2014-2015 Season</a></li>
                <li class="list-group-item"><a href="{{url('boxscores/season_2013_2014')}}">2013-2014 Season</a></li>
            </ul>
        </div>


        <br/>
        <hr>
        <br/>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-lg fa-twitter"></i>&nbspPlayer &amp; Team Tweets</a></li>
            <li><a data-toggle="tab" href="#menu1"><i class="fa fa-lg fa-facebook"></i>&nbspLike us on Facebook</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>Player Tweets</h3>

                <a class="twitter-timeline"  href="https://twitter.com/search?q=from%3Aarronafflalo%20OR%20from%3ADame_Lillard%20OR%20from%3Arolopez42%20OR%20from%3Aaldridge_12%20OR%20from%3Anicolas88batum%20OR%20from%3ASteveBlake5%20OR%20from%3Aallencrabbe%20OR%20from%3Apsufraz23%20OR%20from%3AGeeAlonzo%20OR%20from%3AChrisKaman%20OR%20from%3AMeyersLeonard11%20OR%20from%3Awessywes2%20OR%20from%3ACJMcCollum%20OR%20from%3ADWRIGHTWAY1%20OR%20from%3Atrailblazers" data-widget-id="599516450617856000">Tweets about from:arronafflalo OR from:Dame_Lillard OR from:rolopez42 OR from:aldridge_12 OR from:nicolas88batum OR from:SteveBlake5 OR from:allencrabbe OR from:psufraz23 OR from:GeeAlonzo OR from:ChrisKaman OR from:MeyersLeonard11 OR from:wessywes2 OR from:CJMcCollum OR from:DWRIGHTWAY1 OR from:trailblazers</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

            </div>
            <div id="menu1" class="tab-pane">
                <div class="row">
                    <div class="">
                        <h3>Like Us On Facebook!</h3>
                        <div class="fb-page" data-href="https://www.facebook.com/Trail-Blazers-Fans-com-1432222413694833" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"></div>
                    </div>

                </div>
            </div>

        </div>









