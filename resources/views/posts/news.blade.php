@extends('layout')
@section('title', 'News')
@section('content')




    <h1 class="article-title-show">news by category</h1>
    <br/>

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

                            @php
                             $author = App\User::find($item->user_id)->name;

                             @endphp


                        @endif



                        @php
                            $variable= strip_tags($item->body);
                            $variable =substr($variable,0, 50);
                        @endphp


                        <div class="row">
                            <div class="col-sm-4"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"></a>
                                    @if( $item->videoPath !=null)
                                        <div class="video-container">
                                            {!! $item->videoPath !!}
                                        </div>
                                    @else
                                        <img src="../images/md-img-{{ $item->imgPath}}" class="img-responsive">
                                    @endif

                                    <span>{{$item->mainImg_caption}}</span>
                            </div>
                            <div class="col-sm-8">


                                <h2 class="secondary-posts-title"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{ ucwords($item->title)}}</a></h2>
                                <p class="text-muted">Written by <a href="#">{{$author}}</a> on {{gameDate($item->created_at)}} </p>
                                <p class="text-muted">{{$item->subHead}}</p>

                                <p>{{$variable}}...<a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">READ MORE</a></p>


                            </div>
                            <br/>

                            <hr/>


                        </div>




                    @endforeach

                    <br/>

                    <button type="submit" class="btn btn-success btn-md active" onclick="window.location='{{url('news/general')}}';" >All Team News...</button>

                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>league news</h3>


                    @foreach($nbanews as $item)


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
                            <div class="col-sm-4"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"></a>

                                    @if( $item->videoPath !=null)
                                        <div class="video-container">
                                        {!! $item->videoPath !!}
                                        </div>
                                    @else
                                    <img src="../images/md-img-{{ $item->imgPath}}" class="img-responsive">
                                @endif

                              <span>{{$item->mainImg_caption}}</span>

                            </div>
                            <div class="col-sm-8">


                                <h2 class="secondary-posts-title"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{ ucwords($item->title)}}</a></h2>
                                <p class="text-muted">Written by <a href="#">{{$author}}</a> on {{$game_date}} </p>
                                <p class="text-muted">{{$item->subHead}}</p>

                                <p>{{$variable}}...<a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">READ MORE</a></p>


                            </div>
                            <br/>
                            <br/>

                            <hr/>


                        </div>




                    @endforeach



                    <br/>

                    <button type="submit" class="btn btn-success btn-md active" onclick="window.location='{{url('news/nba')}}';" >All League News...</button>


                </div>

            </div>

            <br/>



            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#past">past blazers</a></li>
                <li><a data-toggle="tab" href="#retro">retro news</a></li>
            </ul>

            <div class="tab-content">
                <div id="past" class="tab-pane fade in active">
                    <h3>past blazers</h3>

                    @foreach($former_players as $item)


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
                            <div class="col-sm-4"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"></a>

                                    @if( $item->videoPath !=null)
                                        <div class="video-container">
                                            {!! $item->videoPath !!}
                                        </div>
                                    @else
                                        <img src="../images/md-img-{{ $item->imgPath}}" class="img-responsive">
                                    @endif

                                    <span>{{$item->mainImg_caption}}</span>
                            </div>
                            <div class="col-sm-8">


                                <h2 class="secondary-posts-title"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{ ucwords($item->title)}}</a></h2>
                                <p class="text-muted">Written by <a href="#">{{$author}}</a> on {{$game_date}} </p>
                                <p class="text-muted">{{$item->subHead}}</p>

                                <p>{{$variable}}...<a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">READ MORE</a></p>


                            </div>
                            <br/>
                            <hr/>


                        </div>




                    @endforeach


                    <br/>

                    <button type="submit" class="btn btn-success btn-md active" onclick="window.location='{{url('news/former-players')}}';" >All Alum News...</button>


                </div>
                <div id="retro" class="tab-pane fade">
                    <h3>retro news</h3>


                    @foreach($retronews as $item)


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
                            <div class="col-sm-4"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"></a>

                                    @if( $item->videoPath !=null)
                                        <div class="video-container">
                                            {!! $item->videoPath !!}
                                        </div>
                                    @else
                                        <img src="../images/md-img-{{ $item->imgPath}}" class="img-responsive">
                                    @endif

                                    <span>{{$item->mainImg_caption}}</span>
                            </div>
                            <div class="col-sm-8">


                                <h2 class="secondary-posts-title"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{ ucwords($item->title)}}</a></h2>
                                <p class="text-muted">Written by <a href="#">{{$author}}</a> on {{$game_date}} </p>
                                <p class="text-muted">{{$item->subHead}}</p>

                                <p>{{$variable}}...<a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">READ MORE</a></p>


                            </div>
                            <br/>
                            <hr/>


                        </div>




                    @endforeach


                    <br/>
                    <button type="submit" class="btn btn-success btn-md active" onclick="window.location='{{url('news/retro')}}';" >All Retro News...</button>

                </div>

            </div>




        </div>

    </div>


@endsection

