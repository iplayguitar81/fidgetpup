@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Rating {{ $rating->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $rating->id }}</td>
                </tr>
                <tr><th> {{ trans('ratings.rating_id') }} </th><td> {{ $rating->rating_id }} </td></tr><tr><th> {{ trans('ratings.post_id') }} </th><td> {{ $rating->post_id }} </td></tr><tr><th> {{ trans('ratings.contents') }} </th><td> {{ $rating->contents }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('ratings/' . $rating->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Rating"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['ratings', $rating->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Rating',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
@endsection