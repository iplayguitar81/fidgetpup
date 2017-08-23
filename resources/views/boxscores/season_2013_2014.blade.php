@extends('layout')
@section('title', '2015-2016 Season')

@section('content')

    <div class="col-md-12">
        <h1>2013-2014 Boxscores</h1>

        <table class="table">
            <thead>
            <tr>

                <th>Game Link</th><th>Date</th>@can('isAdmin')@endcan
            </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($season as $item)


                @php
                    $game_date = new DateTime($item->datey, new DateTimeZone('America/Los_Angeles'));
                    $game_date = date_sub($game_date, date_interval_create_from_date_string('3 hour'));
                    $game_date = $game_date->format('l F dS Y g:i a');
                @endphp
                {{-- */$x++;/* --}}
                <tr>
                    {{--<td>{{ $x }}</td>--}}
                    <td><a href="{{ route('boxscores.show', [$item->id, str_slug($item->game_string)]) }}">{{ $item->game_string }}</a> <span class="pull-left"><br/>
                            {{--{{'SOMEDAY- -> Game images: '. $item->images()->count() }}--}}

               </span></td><td>{{ $game_date }}</td><td>

                        {{strip_tags(str_limit($item->body, 20))}}

                    </td>
                    @can('isAdmin')

                        @if($item->user_id == $user)

                            <td>
                                <a href="{{ url('/boxscores/' . $item->id . '/edit') }}" class="btn btn-success">{{Auth::user()->name}}- -Update Post</a><br/><br/>
                                {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/posts', $item->id],
                                'style' => 'display:inline'
                                ]) !!}


                                {!! Form::submit(Auth::user()->name.' - -Delete Post', ['class' => 'btn btn-danger']) !!}

                                @endif

                                {!! Form::close() !!}
                            </td>
                            @endcan
                </tr>

            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $season->render() !!} </div>
    </div>

@endsection