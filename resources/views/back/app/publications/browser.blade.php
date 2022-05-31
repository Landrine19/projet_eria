@extends('back.app.template.base',["title" => "Mes publications"])

@section('cstyles')
 <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{(asset('assets/back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'))}}">
@endsection


@section('content')
 <!-- Default box -->
 @section('head')
 <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{(asset('assets/back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'))}}">
@endsection


@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-check"></i> Liste des publications
        </h1>
        <a id="add" data-target="#form" data-toggle="modal" href="#" class="btn btn-success btn-add-new">
            <i class="voyager-plus"></i> <span>ajouter une publication</span>
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
                                    <th class="text-center">Titre</th>
                                    <th class="text-center">Journal</th>
                                    <th class="text-center">Année de publication</th>
                                    <th class="text-center">Résumé</th>
                                    <th></th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($data->donnees as $publication)
                                    <tr>
                                        <td>{{$publication->titre }}</td>
                                        <td>{{$publication->journal}}</td>
                                        <td>{{$publication->annee_publication}}</td>
                                        <td>{{$publication->resume}}</td>
                                        <td>
                                            <button  title="Supprimer" id="{{$publication->id}}" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#delete">
                                                <i class="voyager-trash"></i>
                                            </button>
                                            <button title="Modifier" id="{{$publication->id}}" data-toggle="modal" data-target="#form" class="edit btn btn-sm bg-info">
                                                <i class="voyager-pen"></i>
                                            </button>
                                            <a href="{{route('publication.space',$publication->id)}}" class="btn btn-sm btn-primary">
                                                <i class="voyager-user"></i> Détails
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Titre</th>
                                    <th class="text-center">Journal</th>
                                    <th class="text-center">Année de publication</th>
                                    <th class="text-center">Résumé</th>
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
        <h4 class="modal-title w-100">Ajouter un publication</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
        @csrf
        <div id="form_result"></div>
       
        <div class="form-group">
            <label for="titre">Titre: </label>
            <input name="titre" id="titre" class="form-control"/>
            <span class="text-danger" id="titre-error"> </span>
        </div>

        <div class="form-group">
            <label for="journal">Journal : </label>
            <input name="journal" id="journal" class="form-control"/>
            <span class="text-danger" id="journal-error"> </span>
        </div>
        <div class="form-group">
            <label for="annee_publication">Année de publication : </label>
            <input name="annee_publication" type="number" min="1900" id="annee_publication" class="form-control"/>
            <span class="text-danger" id="annee_publication-error"> </span>
        </div>
        <div class="form-group">
            <label for="resume">Résumé : </label>
            <textarea name="resume" id="resume" class="form-control">
            </textarea>    
            <span class="text-danger" id="resume-error"> </span>
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
        actionData.name = "publication";

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