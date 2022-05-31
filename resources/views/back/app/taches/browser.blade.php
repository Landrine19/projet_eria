@extends('back.app.template.base',["title" => "Mes taches"])

@section('cstyles')
 <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{(asset('assets/back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'))}}">
@endsection


@section('content')
 <!-- Default box -->
 <div class="card card-solid">
    <div class="card-header bg-cyan">
        <h3 class="card-title">Liste des taches</h3>
        <div class="card-tools">
          <button type="button" id="add" data-target="#form" data-toggle="modal" class="btn text-light" title="Ajouter">
            Ajouter <i class="fas fa-plus"></i>
          </button>
        </div>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                <tr>
                    <th class="text-center">Titre</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Heure</th>
                    <th></th>
                </tr>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($data->donnees as $tache)
                    <tr>
                        <td>{{$tache->titre }}</td>
                        <td>{{$tache->date}}</td>
                        <td>{{$tache->date}}</td>
                        <td>
                            <button  title="Supprimer" id="{{$tache->id}}" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#delete">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button title="Modifier" id="{{$tache->id}}" data-toggle="modal" data-target="#form" class="edit btn btn-sm bg-info">
                                <i class="fas fa-pen"></i>
                            </button>
                            <a href="{{route('taches.space',$tache->id)}}" class="btn btn-sm btn-primary">
                                <i class="fas fa-user"></i> Détails
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center">Titre</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Heure</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>        
</div>
      <!-- /.card -->
@endsection

@section('form-modal')
<form method="post" id="add-form" enctype="multipart/form-data">
    <div class="modal-header flex-column text-center bg-primary">
        <h4 class="modal-title w-100">Ajouter un tache</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
        @csrf
        <div id="form_result"></div>
        <div class="form-group">
            <label for="user_id">Agent : </label>
            <select name="user_id" id="user_id"  class="form-control">
                <option value="">Selectionnez un agent suiveur pour ce tache</option>
               
            </select>
            <span class="text-danger" id="user_id-error"> </span>
        </div>
        <div class="form-group">
            <label for="localisation_id">Adresse : </label>
            <select name="localisation_id" id="localisation_id"  class="form-control lcs">
                <option value="">Selectionnez une localisation svp</option>
               
            </select>
            <span class="text-danger" id="localisation_id-error"> </span>
        </div>
        <div class="form-group lo-blk">
            <label for="nl">Insérer une localisation: </label>
            <input name="nl" id="nl" class="form-control"/>
            <span class="text-danger" id="nl-error"> </span>
        </div>

        <div class="form-group">
            <label for="nom">Nom : </label>
            <input name="nom" id="nom" class="form-control"/>
            <span class="text-danger" id="nom-error"> </span>
        </div>
        <div class="form-group">
            <label for="prenoms">Prénom(s) : </label>
            <input name="prenoms" id="prenoms" class="form-control"/>
            <span class="text-danger" id="prenoms-error"> </span>
        </div>
        <div class="form-group">
            <label for="email">Email : </label>
            <input type="email" name="email" id="email" class="form-control"/>
            <span class="text-danger" id="email-error"> </span>
        </div>
        <div class="form-group">
            <label for="contact">Contact : </label>
            <input name="contact" id="contact" class="form-control"/>
            <span class="text-danger" id="contact-error"> </span>
        </div>
    </div>
    <input name="hidden_id" id="hidden_id" class="form-control" type="hidden"/>
    <div class="modal-footer justify-content-center">
        <button type="submit" id="valid" class="btn btn-block btn-primary">valider</button>
    </div>
</form>
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
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        
        });
    </script>
    <script>
        actionData.name = "taches";

        $(document).ready(function(){
            $('.lo-blk').hide();
            $('.lcs').on('change',function(){
                if(this.value == "other"){
                    $('.lo-blk').show();
                }else{
                    $('.lo-blk').hide();
                }
            });
        });
    </script>
@endsection