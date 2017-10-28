@extends('layout')
@section('title', 'News')
@section('content')


    <h1 class="article-title-show">news by category</h1>
    <br/>

    <div class="container text-center">



            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">team news</a></li>
                <li><a data-toggle="tab" href="#menu1">league news</a></li>
            </ul>



                @foreach($news as $item)

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3><span class="">

                        <a href="{{ route_articles($item->category)}}" class="btn btn-success btn-lg">
                            <span class="glyphicon glyphicon-folder-open"></span> {{$item->category}}
                        </a>
                    </span></h3>


                        <div class="row">
                            <div class="col-sm-4"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"></a>
                                    @if( $item->videoPath !=null)
                                        <div class="video-container">
                                            {!! $item->videoPath !!}
                                        </div>
                                    @else
                                        <img src="../images/md-img-{{ $item->imgPath}}" class="img-responsive">
                                    @endif
                                    <br/>
                                    <span>{{$item->mainImg_caption}}</span>
                            </div>
                            <div class="col-sm-8">


                                <h2 class="secondary-posts-title"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{ ucwords($item->title)}}</a></h2>
                                <p class="text-muted">{{$item->subHead}}</p>
                                <p class="text-muted">Written by <a href="#">{{written_by($item->user_id)}}</a> on {{gameDate($item->created_at)}} </p>


                                <p>{{snippet($item->body)}}...<a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"> <button type="button" class="btn btn-success btn-xs">READ MORE</button></a></p>


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

                        <div class="row">
                            <div class="col-sm-4"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"></a>

                                    @if( $item->videoPath !=null)
                                        <div class="video-container">
                                        {!! $item->videoPath !!}
                                        </div>
                                    @else
                                    <img src="../images/md-img-{{ $item->imgPath}}" class="img-responsive">
                                @endif
                                <br/>
                              <span>{{$item->mainImg_caption}}</span>

                            </div>
                            <div class="col-sm-8">


                                <h2 class="secondary-posts-title"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{ ucwords($item->title)}}</a></h2>
                                <p class="text-muted">Written by <a href="#">{{written_by($item->user_id)}}</a> on {{gameDate($item->created_at)}} </p>
                                <p class="text-muted">{{$item->subHead}}</p>

                                <p>{{snippet($item->body)}}...<a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"> <button type="button" class="btn btn-success btn-xs">READ MORE</button></a></p>


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

                        <div class="row">
                            <div class="col-sm-4"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"></a>

                                    @if( $item->videoPath !=null)
                                        <div class="video-container">
                                            {!! $item->videoPath !!}
                                        </div>
                                    @else
                                        <img src="../images/md-img-{{ $item->imgPath}}" class="img-responsive">
                                    @endif

                                    <br/>
                                    <span>{{$item->mainImg_caption}}</span>
                            </div>
                            <div class="col-sm-8">


                                <h2 class="secondary-posts-title"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{ ucwords($item->title)}}</a></h2>
                                <p class="text-muted">Written by <a href="#">{{written_by($item->user_id)}}</a> on {{gameDate($item->created_at)}} </p>
                                <p class="text-muted">{{$item->subHead}}</p>

                                <p>{{snippet($item->body)}}...<a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"> <button type="button" class="btn btn-success btn-xs">READ MORE</button></a></p>


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


                        <div class="row">
                            <div class="col-sm-4"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"></a>

                                    @if( $item->videoPath !=null)
                                        <div class="video-container">
                                            {!! $item->videoPath !!}
                                        </div>
                                    @else
                                        <img src="../images/md-img-{{ $item->imgPath}}" class="img-responsive">
                                    @endif
                                    <br/>
                                    <span>{{$item->mainImg_caption}}</span>
                            </div>
                            <div class="col-sm-8">


                                <h2 class="secondary-posts-title"><a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{ ucwords($item->title)}}</a></h2>
                                <p class="text-muted">Written by <a href="#">{{written_by($item->user_id)}}</a> on {{gameDate($item->created_at)}} </p>
                                <p class="text-muted">{{$item->subHead}}</p>

                                <p>{{snippet($item->body)}}...<a class="" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"> <button type="button" class="btn btn-success btn-xs">READ MORE</button></a></p>

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


@endsection

