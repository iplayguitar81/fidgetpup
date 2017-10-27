@extends('layout')

@section('title', 'Map Laravel Test')


@section('content')


@if($results_empty)
        <div class="alert alert-info">
            <span class="glyphicon glyphicon-exclamation-sign"></span>
            No Results for '{{$search}}' Query Try A Different Search!!!!!!!
        </div>



@else
    <h1>Showing Results for '{{$search}}'.....</h1>
    @foreach($results2 as $result)

        <article>
            <div class="col-sm-12 text-center">
        <h3><a href="{{ route('posts.show', [$result->id, str_slug($result->title)]) }}">{{ucwords($result->title)}}</a></h3>
                <p>Written&nbsp;
                    @if($result->user_id != null)
                        by
                        {{written_by($result->user_id)}}
                    @endif

                    <span class="">{{(gameDate($result->created_at))}}</span>
                </p>
                <img class="img-responsive center-block" src="../images/md-img-{{ $result->imgPath}}">


        <p>{{snippet($result->body)}}...     <a class="btn btn-success btn-md active" href="{{ route('posts.show', [$result->id, str_slug($result->title)]) }}">Read More</a></p>
            </div>

    </article>
        <br/>
        <hr>

    @endforeach

    <div class="pagination">{!! $results2->render() !!}</div>

@endif



@endsection