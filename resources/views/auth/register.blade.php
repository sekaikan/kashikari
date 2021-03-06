@extends('layouts.app')

@section('content')
<div class="jumbotron" style="background: url(images/register.jpg); background-size:cover;">
    <div class="container my-5">
        <div class="row py-5" >
            <div class="col-md-6 offset-md-3">
                <div class="card">
                        <div class="card-body">
                            <h2 class="text-center text-muted">Sign Up</h2>
                            <div class="text-center">
                                <i class="fas fa-5x fa-user-circle text-muted my-3"></i>   
                            </div>
                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
    
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="User Name" required autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                            </div>
    {{--
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    --}}
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-blue ">
                                        Sign Up
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
