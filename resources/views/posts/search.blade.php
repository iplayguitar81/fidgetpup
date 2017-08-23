@extends('layout')

@section('title', 'Map Laravel Test')


@section('content')


<h1>Showing Results for '{{$search}}'.....</h1>

@if($results_empty)
        <div class="alert alert-danger text-center">
            No Results for your Query Try A Different Search!!!!!!!
        </div>
    @endif



    @foreach($results2 as $result)

        <?

        $variable= strip_tags($result->body);
        $variable =substr($variable,0, 50);
        // $variable = (str_limit($item->body, 100));
        // $variable= htmlentities($variable);
        ?>


        <article>
        <h3><a href="{{ route('posts.show', [$result->id, str_slug($result->title)]) }}">{{$result->title}}</a></h3>
        <p>Written&nbsp;
            @if($result->user_id != null)
                by
                <? $author = App\User::find($result->user_id)->name; ?>

                {{$author}}
            @endif

            <span class="text-lowercase">{{$result->created_at->format('M dS, Y')}}</span>
        </p>

        <p>{{$variable}}...     <a class="btn btn-danger btn-md active" href="{{ route('posts.show', [$result->id, str_slug($result->title)]) }}">Read More</a></p>


    </article>
        <br/>
        <hr>

    @endforeach

{!! $results2->render() !!}

@endsection