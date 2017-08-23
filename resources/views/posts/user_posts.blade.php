@extends('layout')
@section('title', 'Welcome '.$user_name. ' Here Are Your Blog Posts!')
@section('content')

    <div class="col-md-12">
        <h1>Posts @can('isAdmin')<a href="{{ url('/posts/create') }}" class="btn btn-primary pull-right btn-sm">Add New Post</a>@endcan</h1>
        <br/>
        <br/>

        <p> <span>Welcome {{$user_name}}! <br/> Below are all the posts you have made!</span></p>
        <br/>

            <table class="table">
                <thead>
                <tr>
                    <th>{{ trans('posts.title') }}</th><th>{{ trans('posts.subhead') }}</th><th>{{ trans('posts.body') }}</th><th>Image</th><th>Date</th>@can('isAdmin')<th>Actions</th>@endcan
                </tr>
                </thead>
                <tbody>
                {{-- */$x=0;/* --}}
                @foreach($posts as $item)
                    {{-- */$x++;/* --}}
                    <tr>
                        {{--<td>{{ $x }}</td>--}}
                        <td><a href="{{ url('posts', $item->id) }}">{{ $item->title }}</a></td><td>{{ $item->subHead }}</td><td>

                            {{strip_tags(str_limit($item->body, 20))}}
                        </td>

                        <td><img class="img-responsive thumbnail" src="../images/{{ $item->imgPath}}"></td>
                        <td>{{ $item->created_at->format('m-d-Y') }}</td>

                        @can('isAdmin')
                            <td>
                                <a href="{{ url('/posts/' . $item->id . '/edit') }}" class="btn btn-success">Update</a><br/><br/>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/posts', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        @endcan
                    </tr>

                @endforeach
                </tbody>
            </table>
            <div class="pagination"> {!! $posts->render() !!} </div>




    </div>

        {{--@foreach($posts as $item)--}}

            {{--<article class="uk-article">--}}

                {{--<h1 class="uk-article-title"><a href="{{ url('posts', $item->id) }}">{{ $item->title }}</a></h1>--}}
                {{--<p class="uk-article-lead">HERE IS SUBTITLE</p>--}}
                {{--<p class="uk-article-meta">{{ $item->created_at }}</p>--}}

                {{--<div class="uk-grid">--}}
                    {{--<div class="uk-width-medium-1-2 uk-push-1-2"><img class="uk-responsive-width" src="../images/{{ $item->imgPath}}"></div>--}}
                    {{--<div class="uk-width-medium-1-2 uk-pull-1-2">{{$item->body}}</div>--}}
                {{--</div>--}}





            {{--</article>--}}
            {{--<hr class="uk-article-divider">--}}
        {{--@endforeach--}}
        {{--<p>{{ print_r($route) }}</p> heres where i need to figure out how to
        display the route name better.....
        --}}

@endsection
