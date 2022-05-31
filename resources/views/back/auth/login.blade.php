@extends('layouts.app',["title" => "Page de connexion"])

@section('content')

<div  class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>AKR</b>DM</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Connectez vous svp</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Adresse email :</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Entrez votre email ">
            @error('email')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Mot de passe : </label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
            @error('password')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>   
        <p class="mb-1">
        @if (Route::has('password.request'))
            <a href="{{route('password.request')}}">Mot de passe oublié ?</a>
        @endif  
      </p>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Se souvenir
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-sm btn-primary btn-block">Se connecter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</div>
@endsection




