@php 
    $infos = new Illuminate\Support\Collection;
    $infos->email = \App\Models\Information::whereTitle('email')->first();
    $infos->phone = \App\Models\Information::whereTitle('phone')->first();
    $infos->logo = \App\Models\Information::whereTitle('logo')->first();
@endphp 



@extends('site.template.base-withbread',['title' => 'Espace connexion'])


@section('view-content')

<div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h2> {{config('app.name')}} espace connexion</h2>
						 </div>
					</div>
                   <form action="{{route('login')}}" method="post" name="login">
                       @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entrer votre email">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror    
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mot de passe</label>
                            <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Entrer votre mot de passe">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p class="text-center">  <a href="#">Mot de passe oublié?</a></p>
                        </div>
                        <div class="col-md-12 text-center ">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                        </div>
                        
                        <div class="form-group m-3">
                            <p class="text-center">Vous n'avez pas de compte? <a href="{{url('/register')}}" id="signup">Créer un compte</a></p>
                        </div>
                        <div class="col-md-12 ">
                            <div class="login-or">
                                <hr class="hr-or">
                                <span class="span-or">ou</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="text-center"><a href="{{url('/')}}" id="signup">Retournez à l'accueil</a></p>
                        </div>
                    </form>
            </div>
		</div>
      </div>   
@endsection
