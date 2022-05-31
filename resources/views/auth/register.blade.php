@extends('site.template.rl-base',['title' => 'Espace inscription'])

@section('cstyles')
    <link rel="stylesheet" href="{{asset('assets/register.css')}}">
@endsection

@section('cjavascript')
    <script type="text/javascript">
        $('.blk-enter').hide();
        $('.blk-inv').hide();
        $('.blk-sal').hide();


        $('form input[name="type"]').on('change', function() {
           switch($(this).val()){
             case "Entreprise" :
                                  $('.blk-enter').show();
                                  $('.blk-inv').hide();
                                  $('.blk-sal').hide();
                                break;
             case "Investisseur" :
                                  $('.blk-enter').hide();
                                  $('.blk-inv').show();
                                  $('.blk-sal').hide(); 
                                  break;

             case "Salarié" :     
                                  $('.blk-enter').hide();
                                  $('.blk-inv').hide();
                                  $('.blk-sal').show();
                                  break;
             default : 
                                  $('.blk-enter').hide();
                                  $('.blk-inv').hide();
                                  $('.blk-sal').hide();
             
                      break;
           } 
        });
    </script>
@endsection

@section('content')
 <!-- Form 2 -->
 <div class="form-2-container section-container section-container-gray-bg">
    <div class="container">
        <div class="row">
            <div class="col form-2 section-description wow fadeIn">
                <h2>{{config('app.name')}} Espace inscription</h2>
                <div class="divider-1 wow fadeInUp"><span></span></div>
                <p>
                Vous avez déjà un compte ? <a class="text-primary" href="{{url('/login')}}">Vous connectez svp</a> 
              ou <a class="text-primary" href="{{url('/')}}">retourner à l'accueil</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col form-2-box wow fadeInUp">
                  
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <!-- Preferences  -->
                    <fieldset class="form-group border p-2">
                      <legend class="w-auto px-2">Type de souscripteur</legend>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="salarié" value="Salarié">
                        <label class="form-check-label" for="salarié"> <strong>Salarié</strong></label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="investisseur" value="Investisseur">
                        <label class="form-check-label" for="Investisseur"><strong>Investisseur</strong></label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="entreprise" value="Entreprise">
                        <label class="form-check-label" for="entreprise"><strong>Entreprise/Société</strong></label>
                      </div>
                      @error('type')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </fieldset>
                  </div>
                  <div class="col-md-6">
                    <fieldset class="form-group border p-2">
                        <legend class="w-auto px-2">Informations complémentaires</legend>
                        <div class="form-group blk-enter">
                          <label for="rccm">RCCM:</label>
                          <input type="text" class="form-control firstname" id="rccm"  placeholder="RCCM..." name="rccm">
                        </div>
                        <div class="row blk-inv">
                          <div class="form-group col-6">
                            <label for="nature">Secteur:</label>
                            <select class="form-control firstname" name="nature" id="nature">
                                <option class="text-muted" value="">Sélectionnez votre secteur</option>
                                <option value="International">International</option>
                                <option value="National">National</option>    
                            </select>
                          </div>
                          <div class="form-group col-6">
                            <label for="num_piece">N° de pièce:</label>
                            <input type="text" class="form-control firstname" id="num_piece"  placeholder="Numéro de pièce..." name="num_piece">
                          </div>
                        </div>
                        <div class="row blk-sal">
                          <div class="form-group col-6">
                            <label for="nature">Secteur:</label>
                            <select class="form-control firstname" name="nature" id="nature">
                                <option class="text-muted" value="">Sélectionnez votre secteur</option>
                                <option value="Public">Public</option>
                                <option value="Privé">Privé</option>    
                            </select>
                          </div>
                          <div class="form-group col-6">
                            <label for="num_piece">N° de pièce:</label>
                            <input type="text" class="form-control firstname" id="num_piece"  placeholder="Numéro de pièce..." name="num_piece">
                          </div>
                        </div> 
                    </fieldset>     
                  </div>
                </div>
            
                <div class="row">
                  <div class="col-md-6">
                    <!-- First / Last Name -->
                  <fieldset class="form-group border p-2">
                    <legend class="w-auto px-2">Informations personnels</legend>
                    <div class="form-group">
                      <label for="nom">Nom:</label>
                      <input type="text" class="form-control firstname" id="nom"  placeholder="Nom..." name="nom">
                      @error('nom')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="prenoms">Prénom(s):</label>
                      <input type="text" class="form-control lastname" id="prenoms" placeholder="Prénom(s)..." name="prenoms">
                      @error('prenoms')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="domicile">Domicile:</label>
                      <input type="text" class="form-control lastname" id="domicile" placeholder="Domicile..." name="domicile">
                      @error('domicile')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </fieldset>
                  </div>
                  <div class="col-md-6">
                      <!-- About -->
                    <fieldset class="form-group border p-2">
                      <legend class="w-auto px-2">Contacts</legend>
                      <div class="row">
                          <div class="form-group col-6">
                            <label for="telephone1">Téléphone 1:</label>
                            <input type="text" class="form-control lastname" id="telephone1" placeholder="+225..." name="telephone1">
                            @error('telephone1')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>
                          <div class="form-group col-6">
                            <label for="telephone2">Téléphone 2:</label>
                            <input type="text" class="form-control lastname" id="telephone2" placeholder="+225..." name="telephone2">
                            @error('telephone2')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>
                      </div>
                      <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control lastname" id="email" placeholder="Email..." name="email">
                            @error('email')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                      </div>
                      <div class="row">
                          <div class="form-group col-6">
                            <label for="password">Mot de passe:</label>
                            <input type="password" class="form-control lastname" id="password" placeholder="Mot de passe..." name="password">
                            @error('password')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>
                          <div class="form-group col-6">
                            <label for="confirmation_password">Confirmation mot de passe:</label>
                            <input type="password" class="form-control lastname" id="password_confirmation" placeholder="confirmation..." name="password_confirmation">
                          </div>
                      </div>
                    </fieldset>
                  </div>
                </div>
                <!-- Submit Button  -->
                <div class="form-group row">
                  <div class="col">
                    <button type="submit" class="btn btn-primary btn-customized">Inscription</button>
                  </div>
                </div>
                
            </form>
                  
              </div>
        </div>
    </div>
  </div>

@endsection