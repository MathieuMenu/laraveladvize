@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}">Retour</a>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('users.createregister') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input name="_method" type="hidden" value="POST">

                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required>
                    </div>

                    <label for="firstname" class="col-md-4 control-label">Firstname</label>

                    <div class="col-md-6">
                        <input id="firstname" type="text" class="form-control" name="firstname" required>
                    </div>

                    <label for="birth" class="col-md-4 control-label">Birth</label>

                    <div class="col-md-6">
                        <input id="birth" type="date" class="form-control" name="birth" required>
                    </div>

                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" required>
                    </div>

                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
