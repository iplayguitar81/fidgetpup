@extends('layout')
@section('title', 'News')
@section('content')


<h1 class="article-title-show">latest news categories</h1>

{{--{{$news}}--}}

{{--<a href="{{url('news/general')}}">General News...</a>--}}
{{--<br/>--}}
{{--<a href="{{url('news/retro')}}">Retro News...</a>--}}
{{--<br/>--}}
{{--<a href="{{url('news/nba')}}">NBA News...</a>--}}
{{--<br/>--}}
{{--<a href="{{url('news/former-players')}}">Former Players News...</a>--}}



<div class="container text-center">

    <div class="row">




        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">team news</a></li>
            <li><a data-toggle="tab" href="#menu1">league news</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>team news</h3>

                @foreach($news as $item)


                    @if($item->user_id != null)
                        <? $author = App\User::find($item->user_id)->name; ?>


                    @endif


                    @php
                        $game_date = new DateTime($item->date, new DateTimeZone('America/Los_Angeles'));
                        $game_date = date_sub($game_date, date_interval_create_from_date_string('3 hour'));
                        $game_date = $game_date->format('l F dS Y g:i a');
                    @endphp



                    @php
                        $variable= strip_tags($item->body);
                        $variable =substr($variable,0, 50);
                    $game_date = new DateTime($item->created_at, new DateTimeZone('America/Los_Angeles'));
                        $game_date = date_sub($game_date, date_interval_create_from_date_string('3 hour'));
                        $game_date = $game_date->format('M jS Y');
                    @endphp


                    <div class="row">
                        <div class="col-sm-4"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"><img src="../images/md-img-{{ $item->imgPath}}" class="img-responsive"></a>
                           <br/> <span>{{$item->mainImg_caption}}</span>
                        </div>
                        <div class="col-sm-8">


                            <h3 class="title"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{ $item->title}}</a></h3>
                            <p class="text-muted">Written by <a href="#">{{$author}}</a> on {{$game_date}} </p>
                            <p class="text-muted">{{$item->subHead}}</p>

                            <p>{{$variable}}...<a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">READ MORE</a></p>


                        </div>

                        <hr/>


                    </div>


                        {{--<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">--}}

                        <img src="../images/md-img-{{ $item->imgPath}}" class="img-responsive" style="width:100%" alt="Team News Image">
                        <h4 class="secondary-posts-title"><a  href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{$item->title}}</a><br/>{{$item->date}}</h4>
                        @php
                            $variable= strip_tags($item->body);
                            $variable =substr($variable,0, 50);
                        @endphp
                        <p>{!! $variable !!}...</p>
                        <a class="btn btn-danger btn-md active" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">Continue Reading</a>
                        <br/>
                        <br/>

                        <button type="submit" class="btn center-block btn-md" onclick="window.location='{{url('news/general')}}';" >More Team News...</button>

                        <br/>
                        <br/>

                @endforeach



            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>league news</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

        </div>



        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#past">past blazers</a></li>
            <li><a data-toggle="tab" href="#retro">retro news</a></li>
        </ul>

        <div class="tab-content">
            <div id="past" class="tab-pane fade in active">
                <h3>past blazers</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div id="retro" class="tab-pane fade">
                <h3>retro news</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

        </div>










        @foreach($retronews as $item)


            @php
                $game_date = new DateTime($item->date, new DateTimeZone('America/Los_Angeles'));
                $game_date = date_sub($game_date, date_interval_create_from_date_string('3 hour'));
                $game_date = $game_date->format('l F dS Y g:i a');
            @endphp

        <div class="col-sm-3">
            <h1 class="Ripper"><a class="" href="{{url('news/retro')}}">retro news</a></h1>
            <img src="../images/md-img-{{ $item->imgPath}}" class="img-responsive" style="width:100%" alt="Retro News Image">
            <h4 class="secondary-posts-title"><a  href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{$item->title}}</a><br/>{{$item->date}}</h4>
            @php
                $variable= strip_tags($item->body);
                $variable =substr($variable,0, 50);
            @endphp
            <p>{!! $variable !!}...</p>
            <a class="btn btn-danger btn-md active" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">Continue Reading</a>
            <br/>
            <br/>
            <button type="submit" class="btn center-block btn-md" onclick="window.location='{{url('news/retro')}}';" >More Retro News...</button>


        <br/>
        <br/>

        </div>
        @endforeach


            @foreach($former_players as $item)


                @php
                    $game_date = new DateTime($item->date, new DateTimeZone('America/Los_Angeles'));
                    $game_date = date_sub($game_date, date_interval_create_from_date_string('3 hour'));
                    $game_date = $game_date->format('l F dS Y g:i a');
                @endphp

                <div class="col-sm-3">
                    <h1 class="Ripper" > <a  href="{{url('news/former-players')}}">past blazers</a></h1>
                    <img src="../images/md-img-{{ $item->imgPath}}" class="img-responsive" style="width:100%" alt="Past Blazers News Image">
                    <h4 class="secondary-posts-title"><a  href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{$item->title}}</a><br/>{{$item->date}}</h4>
                    @php
                        $variable= strip_tags($item->body);
                        $variable =substr($variable,0, 50);
                    @endphp
                    <p>{!! $variable !!}...</p>
                    <a class="btn btn-danger btn-md active" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">Continue Reading</a>
                    <br/>
                    <br/>

                    <button type="submit" class="btn center-block btn-md" onclick="window.location='{{url('news/former-players')}}';" >More Alum News...</button>


                    <br/>
                    <br/>

                </div>
            @endforeach



            @foreach($nbanews as $item)


                @php
                    $game_date = new DateTime($item->date, new DateTimeZone('America/Los_Angeles'));
                    $game_date = date_sub($game_date, date_interval_create_from_date_string('3 hour'));
                    $game_date = $game_date->format('l F dS Y g:i a');
                @endphp

                <div class="col-sm-3">
                    <h1 class="Ripper"><a class="" href="{{url('news/nba')}}">league news</a></h1>
                    <img src="../images/md-img-{{ $item->imgPath}}" class="img-responsive" style="width:100%" alt="NBA News Image">
                    <h4 class="secondary-posts-title"><a  href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{$item->title}}</a><br/>{{$item->date}}</h4>

                    @php
                        $variable= strip_tags($item->body);
                        $variable =substr($variable,0, 50);
                    @endphp
                    <p>{!! $variable !!}...</p>
                    <a class="btn btn-danger btn-md active" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">Continue Reading</a>
                    <br/>
                    <br/>



                    <button type="submit" class="btn center-block btn-md" onclick="window.location='{{url('news/nba')}}';" >More League News...</button>

                    <br/>
                    <br/>
                </div>
            @endforeach



    <hr>



    </div>

</div>


@endsection

