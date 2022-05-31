@extends('layouts.app',["title" => "Restauration mot de passe"])

@section('content')
<div class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>AKR</b>DM</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Mot de passe oublié? Vous pouvez facilement le retrouver ici.</p>

      <form action="{{ route('password.email') }}" method="post">
          @csrf
        <div class="form-group mb-3">
          <label for="email">Adresse email</label>  
          <input type="email" class="form-control" name="email" placeholder="Email">
          @error('email')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Demander un nouveau</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="{{url('/login')}}">Se connecter</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

</div>
@endsection
