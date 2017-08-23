@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                {{--<a class="btn btn-primary" href="{{ route('social.login', ['facebook']) }}">Facebook</a>--}}
                            </div>
                        </div>
                    </form>
            <h1>Login/Register with your favorite Social Media:</h1>
<p>This can be convenient for those who do not wish to keep track of remembering another username and password just for use on this site.  The alternative to that is to login with your favorite social media provider below.  We will only store your email address and name from these sites.  We will not sell your information to anyone!  Thank you!  This was implemented as a convenience to you! :D</p>
                    <div class="list-group">
                        <a href="{{url('facebook/authorize')}}"><button type="button" class="list-group-item"><i class="fa fa-lg fa-facebook"></i> &nbsp;Facebook</button></a>
                        <a href="{{url('google/authorize')}}"><button type="button" class="list-group-item"><i class="fa fa-lg fa-google"></i> &nbsp;Google</button></a>
                        <a href="{{url('github/authorize')}}"><button type="button" class="list-group-item"><i class="fa fa-lg fa-github"></i> &nbsp;Github</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
