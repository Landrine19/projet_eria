@extends('back.app.template.base',['title' => 'Profile'])

@section('cstyles')
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('assets/back/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
 <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{(asset('assets/back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'))}}">
@endsection

@php 
  $infos = Auth::user()->membre ?? NULL;
  $contacts = [];
  if($infos): 
    $contacts = $infos->contacts;
    $postes = $infos->postes;
  endif;
@endphp 

@section('app-content')
<div class="row">
  <div class="col-12 col-sm-12 col-md-12">
    <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Informations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Mes contacts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Mes postes</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade bg-light show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
            <div class="row p-5">
              <div class="col-md-3">

                <!-- About Me Box -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Mes informations</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Nom & prénoms</strong>

                    <p class="text-muted">
                      @if($infos)
                        {{$infos->nom. " ". $infos->prenoms }}
                      @endif
                    </p>

                    <hr>

                    <strong><i class="fas fa-user mr-1"></i> Spécialité</strong>
                    <p class="text-muted">
                      {{$infos ? $infos->specialite : "" }}
                    </p>
                    

                    <hr>

                    <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                    <p class="text-muted">{{$infos ? $infos->email : ""}} </p>

                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
              <div class="col-md-9">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title bg-primary">Formulaire d'inscription</h3>
                  </div>
                  <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{route('profile.update')}}">
                          @csrf
                          <input type="hidden" class="form-control" name="hidden_id" value="{{$infos ? $infos->id : NULL}}">

                          <div class="form-group row">
                            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" value="{{$infos ? $infos->nom : ''}}">
                                @error('nom')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="prenoms" class="col-sm-2 col-form-label">Prénom(s)</label>
                            <div class="col-sm-10">
                                  <input type="text" class="form-control" name="prenoms" id="prenoms" placeholder="Prénom(s)" value="{{$infos ? $infos->prenoms : ''}}">
                                  @error('prenoms')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Genre</label>
                            <div class="col-sm-10">
                                <select name="sexe" id="sexe" class="form-control" value="{{$infos ? $infos->sexe : ''}}">
                                    <option value="">CHOISIR VOTRE GENRE</option>
                                    <option value="M">Homme</option>
                                    <option value="F">Femme</option>
                                </select>
                                @error('sexe')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{$infos ? $infos->email : ''}}">
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                              <label for="specialite" class="col-sm-2 col-form-label">Spécialité</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="specialite" id="specialite" placeholder="specialite" value="{{$infos ? $infos->specialite : ''}}">
                                  @error('specialite')
                                      <span class="text-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror 
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="specialite" class="col-sm-2 col-form-label">Téléphone</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Votre contact" value="{{$infos ? $infos->telephone : ''}}">
                                  @error('telephone')
                                      <span class="text-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror 
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="specialite" class="col-sm-2 col-form-label">Année d'entrée</label>
                              <div class="col-sm-10">
                                  <input type="number" min="1996" class="form-control" name="annee_entree" id="annee_entree" placeholder="specialite" value="{{$infos ? $infos->annee_entree : ''}}">
                                  @error('annee_entree')
                                      <span class="text-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror 
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              @if($infos)
                                <button type="submit" class="btn btn-block btn-success">Modifier</button>
                              @else
                                <button type="submit" class="btn btn-block btn-primary">Ajouter</button>
                              @endif
                            </div>
                          </div>
                          
                        </form>
                      
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <div class="tab-pane fade bg-light" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
            <form method="POST" action="{{route('profile.updating')}}" class="p-5">
                @csrf
                <div class="form-group">
                   <label for="name">Nom d'utilisateur</label>
                   <input name="name" type="text" value="{{$data->name}}" class="form-control">
                   @error('name')
                      <span class="text-danger">{{$message}}</span>
                   @enderror 
                </div>
                <div class="form-group">
                   <label for="email">Email</label>
                   <input name="email" type="email" value="{{$data->email}}" class="form-control">
                   @error('email')
                      <span class="text-danger">{{$message}}</span>
                   @enderror 
                </div>
                <div class="form-group">
                  <label for="password">Mot de passe</label>
                  <input name="password" type="password" placeholder="Laisser vide si vous souhaitez conserver l'ancien" class="form-control">
                   @error('email')
                      <span class="text-danger">{{$message}}</span>
                   @enderror
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Modifier</button>
                </div>
            </form>
          </div>
          <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
            <div class="card card-info">
              <div class="card-header">
                  <h3 class="card-title">Mes contacts</h3>

                  <div class="card-tools">
                      <button type="button" 
                              title="ajouter un contact" 
                              class="btn btn-tool add-contact"
                              data-toggle="modal"
                              data-target="#contact-modal"
                              >
                      <i class="fas fa-plus"></i>
                      </button>
                  </div>
              </div>
              <div class="card-body p-2">
                  <table id="contact-table" class="table table-stripped table-bordered">
                      <thead class="bg-dark">
                          <tr>
                              <th>Type</th>
                              <th>Valeur</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($infos->contacts as $contact)
                              <tr>
                                  <td>{{$contact->typecontact->intitule}}</td>
                                  <td>{{$contact->contact}}</td>
                                  <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm p-2">
                                        <button id="{{$contact->id}}" data-toggle="modal" data-target="#contact-modal" class="btn btn-sm btn-info mr-1 edit-contact" title="modification">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <button id="{{$contact->id}}" data-toggle="modal" title="suppression" data-target="#delete-modal" class="btn btn-sm btn-danger mr-1 delete-contact">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                  </td>
                              </tr> 
                          @endforeach 
                      </tbody>
                  </table>
              </div>
                  <!-- /.card-body -->
            </div>  
          </div>
          <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
            <div class="card card-info">
                  <div class="card-header">
                      <h3 class="card-title">Mes postes</h3>

                      <div class="card-tools">
                          <button type="button" 
                                  title="ajouter un poste" 
                                  class="btn btn-tool add-post"
                                  data-toggle="modal"
                                  data-target="#poste-modal"
                                  >
                          <i class="fas fa-plus"></i>
                          </button>
                      </div>
                  </div>
                  <div class="card-body p-2">
                      <table id="poste-table" class="table table-stripped table-bordered">
                          <thead class="bg-dark">
                              <tr>
                                  <th>Poste</th>
                                  <th>Debut</th>
                                  <th>Fin</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($infos->postes as $poste)
                                  <tr>
                                      <td>{{$poste->libelle}}</td>
                                      <td>{{$poste->debut}}</td>
                                      <td>{{$poste->fin}}</td>
                                      <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm p-2">
                                            <button id="{{$poste->id}}" data-toggle="modal" data-target="#poste-modal" class="btn btn-sm btn-info mr-1 edit-poste" title="modification">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button id="{{$poste->id}}" data-toggle="modal" title="suppression" data-target="#delete-modal" class="btn btn-sm btn-danger mr-1 delete-poste">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                      </td>
                                  </tr> 
                              @endforeach 
                          </tbody>
                      </table>
                  </div>
                      <!-- /.card-body -->
                </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>         
</div>
<div class="modal" id="contact-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-primary">
                <h4>Enregistrement d'un contact</h4>
            </div>
            <div class="modal-body bg-light">
                <form id="contact-form">
                    <div id="result"></div>
                    @csrf
                    <div class="form-group">
                      <label for="typecontact_id">Choix du type</label>
                      <select class="form-control" name="typecontact_id" id="typecontact_id">
                          <option value="">Choix d'un type contact</option>
                          @foreach($data->typecontacts as $tc)
                            <option value="{{$tc->id}}">{{$tc->intitule}}</option>
                          @endforeach
                      </select> 
                      <span class="text-danger" id="contact_id-error"></span>   
                    </div>
                    <div class="form-group">
                      <label for="contact">Valeur</label>
                      <input class="form-control" type="text" placeholder="La valeur du contact" name="contact" id="contact">
                      <span class="text-danger" id="contact-error"></span>   
                    </div>
                    <input type="hidden" name="membre_id" id="membre_id" value="{{$infos ? $infos->id : NULL}}">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block ok" type="submit">
                            valider
                        </button>
                    </div>
                </form>
            </div>  
        </div>
    </div>            
</div>
<div class="modal" id="poste-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-primary">
                <h4>Information un poste</h4>
            </div>
            <div class="modal-body bg-light">
                <form id="poste-form" method="POST">
                    <div id="result"></div>
                    @csrf
                    <div class="form-group">
                      <label for="poste_id">Choix du type</label>
                      <select class="form-control" name="poste_id" id="poste_id">
                          <option value="">Choix d'un type de poste</option>
                          @foreach($data->typeposte as $type)
                            <option value="{{$type->id}}">{{$type->libelle}}</option>
                          @endforeach
                      </select>
                      <span class="text-danger" id="poste_id-error"></span>   
                    </div>
                    <div class="form-group">
                      <label for="Debut">Debut</label>
                      <input class="form-control" type="date" placeholder="La valeur du contact" name="debut" id="debut">
                      <span class="text-danger" id="debut-error"></span>   
                    </div>
                    <div class="form-group">
                      <label for="debut">Fin</label>
                      <input class="form-control" type="date" placeholder="La valeur du contact" name="fin" id="fin">
                      <span class="text-danger" id="fin-error"></span>   
                    </div>
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block ok" type="submit">
                            valider
                        </button>
                    </div>
                </form>
            </div>  
        </div>
    </div>            
</div>
<div class="modal" id="delete-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-primary">
            <h4>Suppression</h4>
            </div>
            <div class="modal-body bg-light">
                <div id="result"></div>
                Voulez vous retirer ce contact
            </div>
            <form id="delete-form" action="">
                @csrf
                <input name="membre_id" id="membre" type="hidden">
            </form>
            <div class="modal-footer pull-left">
                <button class="btn btn-sm btn-danger ok">valider</button>
                <button class="btn btn-sm btn-secondary" data-dismiss="modal">annuler</button>                
            </div>  
        </div>
    </div>  
</div>
@endsection

@section('cscripts')
    <script src="{{asset('assets/back/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/back/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/back/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/back/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/back/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/back/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/back/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/back/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/back/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>  
    <script>
      $('#contact-table').DataTable();
      $('#poste-table').DataTable();
      function loading(data,target){
        $.ajax({
            url : data.chemin,
            type : "GET",
            success : function(data){
                let donnees = data.response_data ? data.response_data : data.data;
                let arr = donnees.data ? donnees.data : donnees;
                putDataInField(arr,target);
            }
        })
      }

      $(document).ready(function(){
              $('.add-post').click(function(e){
                reset("#poste-form");
              })
              $('.edit-poste').click(function(e){
                let data = {
                    chemin : "/users/poste/edit/"+this.id
                };
                loading(data,"#poste-form");
              })

              $('.edit-contact').click(function(e){
                let data = {
                    chemin : "/contacts/edit/"+this.id
                };
                loading(data,"#contact-form ");
              })

              $('.add-contact').click(function(e){
                  reset("#contact-form");
              })


              $('#contact-form').on('submit',function(e){
                  e.preventDefault();
                  let elementForm = new FormData(this);
                  $.ajax({
                    url : "{{route('contacts.create')}}",
                    type : 'POST',
                    data : elementForm,
                    processData : false,
                    contentType : false,
                    success : function(data){
                        let target = "#contact-form";
                        if(data.success){
                            successTreatment(data.message,target+" #result");     
                        }else{
                            let errs = data.response_data ? data.response_data : data.data;
                            failTreatment(errs,target);
                        }
                    }
                  })              
              });

              $('#poste-form').on('submit',function(e){
                  e.preventDefault();
                  let elementForm = new FormData(this);
                  $.ajax({
                    url : "{{route('poste.add')}}",
                    type : 'POST',
                    data : elementForm,
                    processData : false,
                    contentType : false,
                    success : function(data){
                        let target = "#poste-form";
                        if(data.success){
                            successTreatment(data.message,target+" #result");     
                        }else{
                            let errs = data.response_data ? data.response_data : data.data;
                            failTreatment(errs,target);
                        }
                    }
                  })
              })
         
          })  
    </script>
    <!-- SweetAlert2 -->
   @if(session()->has('message'))
      <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
      <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
      <script type="text/javascript">
          $(function() {
              var Toast = Swal.mixin({
                              toast: true,
                              position: 'top-end',
                              showConfirmButton: false,
                              timer: 3000
                          });
              let message = "{{ session()->get('message') }}";
                  Toast.fire({
                      icon: 'success',
                      title: message
                  });
            
          })
         
   

      </script>
  @endif 
@endsection