@php 
    $publication = $data->donnees;
@endphp

@extends('back.app.template.base',["title" => "publication: #".$publication->titre])

@section('cstyles')
 <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{(asset('assets/back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'))}}">
@endsection


@section('content')
<div class="page-content browse container-fluid">
    @include('voyager::alerts')
    <div class="row">
        <div class="col-md-12">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Profile Image -->
                            <h1 class="page-title">
                                <i class="voyager-check"></i> Informations
                            </h1>
                            <div class="panel">
                                <div class="panel-body">
                                    <strong><i class="voyager-message"></i> Titre</strong>
                                    <p class="text-muted text-capitalize">{{$publication->titre}}</p>                       
                                    <hr>
                                    <strong><i class="voyager-message"></i> Journal</strong>
                                    <p class="text-muted text-capitalize">{{$publication->journal}}</p>                       
                                    <hr>
                                    <strong><i class="fas"></i> Annéee de publication</strong>
                                    <p class="text-muted">
                                        {{$publication->annee_publication}}
                                    </p>

                                </div>
                                <!-- /.card-body -->
                            </div>

                            <hr>
                            <div class="container-fluid">
                                <h1 class="page-title">
                                    <i class="voyager-check"></i> Résumé
                                </h1>
                                <a title="ajouter un résumé" 
                                            data-toggle="modal"
                                            data-target="#resume-modal" 
                                            href="#" class="btn btn-success">
                                    <i class="voyager-pen"></i>
                                </a>
                            </div>
                            <!-- /.card -->
                            <div class="panel">
                                <div class="panel-body p-0">
                                    <span>
                                        {{$publication->resume}}
                                    </span>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    <!-- /.col -->
                    
                        <div class="col-md-8">
                            <div class="container-fluid">
                                <h1 class="page-title">
                                    <i class="voyager-check"></i> Auteur(s)
                                </h1>
                                <a title="ajouter un auteur" 
                                            class="btn btn-primary"
                                            data-toggle="modal"
                                            data-target="#auteur-modal">
                                    <i class="voyager-plus"></i>
                                    ajouter un auteur
                                </a>
                            </div>

                            <div class="panel">
                           
                            <div class="panel-body p-2">
                                <table id="dataTable" class="table table-stripped table-bordered">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th>Nom & Prénom(s)</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($publication->auteurs as $auteur)
                                            <tr>
                                                <td>{{$auteur->nom." ".$auteur->prenoms}}</td>
                                                <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm p-2">
                                                    <button id="{{$auteur->id}}" data-toggle="modal" data-target="#auteur-modal" class="btn btn-info mr-1 edit"><i class="voyager-pen"></i></button>
                                                    <button id="{{$auteur->id}}" data-toggle="modal" data-target="#delete-modal" class="btn btn-danger mr-1 delete"><i class="voyager-trash"></i></button>
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
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
        </div>    
    </div>
    <div class="modal"id="auteur-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center bg-primary">
                   <h4 class="title">Information(s) de l'auteur(s)</h4>
                </div>
               
                <div class="modal-body">
                    <form id="auteur-form" method="POST">
                        @csrf
                        <div id="result"></div>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" id="nom" class="form-control">
                            <span class="text-danger" id="nom-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="prenoms">Prénom(s)</label>
                            <input type="text" name="prenoms" id="prenoms" class="form-control">
                            <span class="text-danger" id="prenoms-error"></span>
                        </div>
                        <input type="hidden" name="publication_id" value="{{$publication->id}}">
                        <input type="hidden" name="hidden_id" id="hidden_id">
                        <div class="form-group">
                            <button class="btn btn-block btn-primary" type="submit">
                                valider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" id="resume-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center bg-primary">
                   <h4>@if($publication->resume) Modifier le résumé @else Ajouter le résumé @endif</h4>
                </div>
                <div class="modal-body bg-light">
                    <form id="resume-form" action="{{route('publication.resume')}}" method="post">
                        <div id="result"></div>
                        @csrf
                        <div class="form-group">
                            <textarea value="{{$publication->resume}}" name="resume" id="resume" cols="30" class="form-control" rows="10">

                            </textarea>
                        </div>
                        <input type="hidden" name="hidden_id" value="{{$publication->id}}">
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">
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
                        Voulez vous retirer cet auteur de la publication
                    </div>
                    <div class="modal-footer pull-left">
                        <button class="btn btn-sm btn-danger ok">valider</button>
                        <button class="btn btn-sm btn-secondary" data-dismiss="modal">annuler</button>                
                    </div>  
                </div>
        </div>  
    </div>
@stop

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
            $("#dataTable").DataTable();
        });
    </script>
    <script type="text/javascript">
        actionData.name = "auteurs";

        $(document).ready(function(){
            var appId;

            $('.delete').click(function(e){
                appId = this.id;
            })

            $('#delete-modal .ok').click(function(e){
                e.preventDefault();
                deleteData(appId);
            })

            function deleteData(id){                                                                                                                                

                $.ajax({
                    url : "/"+actionData.name+"/delete/"+id,
                    type : "GET"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ,
                    success : function(data){
                        treatmentDelete(data.message,'#delete-modal #result');
                    }
                })
            }

            $('#auteur-form').on('submit',function(e){
                e.preventDefault();
                let elementForm = new FormData(this);
                
                let chem = elementForm.hidden_id  ?  '{{route("auteurs.create")}}' : '{{route("auteurs.update")}}';
                $.ajax({
                    url : chem,
                    type : 'POST',
                    data : elementForm,
                    processData : false,
                    contentType : false,
                    success : function(data){
                        let target = "#auteur-form";
                        if(data.success){
                            successTreatment(data.message,target+" #result");     
                        }else{
                            let errs = data.response_data ? data.response_data : data.data;
                            failTreatment(errs,target);
                        }
                    }  
                })
            })

            $('#resume-form').on('submit',function(e){
                e.preventDefault();
                let elementForm = new FormData(this);
                $.ajax({
                    url : "{{route('publication.resume')}}",
                    type : 'POST',
                    data : elementForm,
                    processData : false,
                    contentType : false,
                    success : function(data){
                        if(data.success) {
                            html = "";
                            html = '<div class="alert alert-success">' + data.message + '</div>';
                            $('#resume-form #result').html(html);

                            setTimeout(function(){
                                $('#state-form #result').html("");
                                location.reload();
                            }, 3000);         
                        }
                    }  
                })
            })
            
            $('.edit').click(function(e){
                e.preventDefault();

                let i =this.id;
                let data = {
                    chemin : "{{URL::to('/')}}"+"/auteurs/edit/"+i
                }  
                loadFromDatabase(data);      
            })


            function loadFromDatabase(data){
                $.ajax({
                    url : data.chemin,
                    type : "GET",
                    success : function(data){
                        let donnees = data.response_data ? data.response_data : data.data;
                        putDataInField(donnees,"#auteur-form");
                    }
                })
            }
        })
    </script>
@stop