@php
$reunion = $data->donnees;
foreach ($reunion->membres as $m1):
    if ($data->membres->get($m1->id)):
        $data->membres->forget($m1->id);
    endif;
endforeach;
$user = auth()->user()->membre;
$currentMembre = App\Models\EvenementMembre::where('membre_id', $user->id)
    ->where('evenement_id', $reunion->id)
    ->first();
$isModerateur = $currentMembre != null && $currentMembre->role == 'moderateur';

$notExpired = $reunion->date_evenement > date('Y-m-d H:i:s');

@endphp

@extends('back.app.template.base',["title" => "Reunion: #".$reunion->intitule])

@section('cstyles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection


@section('content')
    <!-- Default box -->
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <h1 class="page-title">
                                <i class="voyager-check"></i> Informations
                            </h1>
                            <div class="panel">
                                <div class="panel-body box-profile">
                                    <strong><i class="voyager-message"></i> Intitulé</strong>
                                    <p class="text-muted text-capitalize">{{ $reunion->intitule }}</p>
                                    <hr>
                                    <strong><i class="voyager-message"></i> Lieu</strong>
                                    <p class="text-muted text-capitalize">{{ $reunion->lieu }}</p>
                                    <hr>
                                    <strong><i class="fas"></i> Date</strong>
                                    <p class="text-muted">
                                        {{ date_format(date_create($reunion->date_evenement), 'd/m/Y') }}
                                    </p>
                                </div>

                            </div>

                            <hr>
                            <div class="container-fluid">
                                <h1 class="page-title">
                                    <i class="voyager-check"></i> Résumé
                                </h1>
                                <a title="ajouter un résumé" data-toggle="modal" data-target="#resume-modal" href="#"
                                    class="btn btn-success pull-center-right">
                                    <i class="voyager-pen"></i>
                                </a>
                            </div>
                            <div class="panel">
                                <div class="panel-body p-0">
                                    <span>
                                        {{ $reunion->resume }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 p-4">
                            @include(
                                'back.app.evenements.ajouter-participant'
                            )
                        </div>
                    </div>
                    @include(
                        'back.app.evenements.compterendu.compterendu'
                    );
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="participant-modal">
        @include('back.app.evenements.modals.add-participant')
    </div>

    <div class="modal" id="resume-modal">
        @include('back.app.evenements.modals.edit-add-resume')
    </div>

    <div class="modal" id="pointer-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center bg-primary">
                    <h4>Etat de présence</h4>
                </div>
                <div class="modal-body bg-light">
                    <form id="pointer-form">
                        <div id="result"></div>
                        @csrf
                        <div class="form-group">
                            <select class="form-control" name="presence" id="presence">
                                <option value="false">Absent</option>
                                <option value="true">Présent</option>
                            </select>
                        </div>
                        <input type="hidden" name="evenement_id" value="{{ $reunion->id }}">
                        <input type="hidden" name="membre_id" id="membre">
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
        @include('back.app.evenements.modals.delete-participant')
    </div>
    <div class="modal" id="justification">
        @include('back.app.evenements.modals.justifier')
    </div>
    @include('back.app.evenements.justificatif-container')
    @include('partials.modal');
@stop

@section('cscripts')
    <script src="{{ asset('assets/back/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/modals/init-modal.js') }}"></script>
    <script src="{{ asset('js/modals/modal-actions.js') }}"></script>
    <script src="{{ asset('js/init-compterendu.js') }}"></script>
    <script src="{{ asset('js/compterendu.js') }}"></script>
    <script src="{{ asset('js/rubrique.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#dataTable").DataTable();
            $("#dataTable2").DataTable();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.pointer').click(function(e) {
                e.preventDefault();
                let att = $(this).attr('presence');
                $('#pointer-form #presence').val(att);
                $('#pointer-form #membre').val(this.id);
                $('#pointer-form').submit();
            });

            $('.del').click(function(e) {
                e.preventDefault();
                $('#delete-form #membre').val(this.id);
            });

            $('#delete-modal .ok').click(function(e) {
                e.preventDefault();
                $('#delete-form').submit();
            });


            $('#pointer-form').on('submit', function(e) {
                e.preventDefault();
                let elementForm = new FormData(this);
                $.ajax({
                    url: "{{ route('participant.presence') }}",
                    type: 'POST',
                    data: elementForm,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.success) {
                            html = "";
                            html = '<div class="alert alert-success">' + data.message +
                                '</div>';
                            $('#pointer-form #result').html(html);

                            setTimeout(function() {
                                $('#pointer-form #result').html("");
                                location.reload();
                            }, 1);
                        }
                    }
                });
            });

        })
    </script>
@stop
