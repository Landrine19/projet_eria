@extends('layouts.app')

@section('content')
<div class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <a href="#"><b>AKR</b>DM</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Plus qu'une étape et vous aurez un nouveau mot de passe. saisissez le maintenant</p>
      <form action="{{route('password.update')}}" method="post">
        @csrf
        <input type="hidden" name="email" value="{{$email}}">
        <div class="form-group mb-3">
            <label for="password">Entrer le nouveau mot de passe</label>
            <input name="password" type="password" class="form-control" placeholder="Password">
            @error('password')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="confirm">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Changer mot de passe</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="{{url('/login')}}">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</div>
@endsection
