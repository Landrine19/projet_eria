@extends('back.app.template.base',["title" => "Mes offres"])

@section('head')
 <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{(asset('assets/back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'))}}">
@endsection


@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-check"></i> Liste des offres
        </h1>
        <a id="add" data-target="#form" data-toggle="modal" href="#" class="btn btn-success btn-add-new">
            <i class="voyager-plus"></i> <span>ajouter une offre</span>
        </a>
    </div>
@endsection        

@section('content')
 <!-- Default box -->
<div class="page-content browse container-fluid">
    @include('voyager::alerts')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                <tr>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Titre</th>
                                    <th class="text-center">Début</th>
                                    <th class="text-center">Fin</th>
                                    <th class="text-center">Description</th>
                                    <th></th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($data->donnees as $offre)
                                    <tr>
                                        <td>{{$offre->type }}</td>
                                        <td>{{$offre->titre}}</td>
                                        <td>{{$offre->debut}}</td>
                                        <td>{{$offre->fin}}</td>
                                        <td>{{$offre->description}}</td>
                                        <td>
                                            <button  title="Supprimer" id="{{$offre->id}}" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#delete">
                                                <i class="voyager-trash"></i>
                                            </button>
                                            <button title="Modifier" id="{{$offre->id}}" data-toggle="modal" data-target="#form" class="edit btn btn-sm bg-info">
                                                <i class="voyager-pen"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Titre</th>
                                    <th class="text-center">Début</th>
                                    <th class="text-center">Fin</th>
                                    <th class="text-center">Description</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>                       
</div>        
    <!-- /.card -->
@endsection

@section('form-modal')
<form method="post" id="add-form" enctype="multipart/form-data">
    <div class="modal-header flex-column text-center bg-primary">
        <h4 class="modal-title w-100">Ajouter un offre</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
        @csrf
        <div id="form_result"></div>
        <div class="form-group">
            <label for="type">Type : </label>
            <select name="type" id="type"  class="form-control">
                <option value="">Selectionnez un type offre</option>
                <option value="stage">Stage</option>
                <option value="emploi">Emploi</option>
                <option value="memoire">Memoire</option>
                <option value="these">Thèse</option>
            </select>
            <span class="text-danger" id="type-error"> </span>
        </div>
       
        <div class="form-group">
            <label for="titre">Titre : </label>
            <input name="titre" id="titre" class="form-control"/>
            <span class="text-danger" id="titre-error"> </span>
        </div>

        <div class="form-group">
            <label for="debut">Début : </label>
            <input type="date" name="debut" id="debut" class="form-control"/>
            <span class="text-danger" id="debut-error"> </span>
        </div>
        <div class="form-group">
            <label for="fin">Fin : </label>
            <input type="date" name="fin" id="fin" class="form-control"/>
            <span class="text-danger" id="fin-error"> </span>
        </div>
        <div class="form-group">
            <label for="description">Description : </label>
            <textarea name="description" id="description" class="form-control">
            </textarea>   
            <span class="text-danger" id="description-error"> </span>
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
    <script src="{{asset('assets/back/dist/js/treatment.js')}}"></script>  
   
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        
        });
    </script>
    <script>
        actionData.name = "offre";

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