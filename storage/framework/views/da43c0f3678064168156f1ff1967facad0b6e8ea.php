<?php $__env->startSection('head'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('assets/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        .panel-body {
            background-color: #eee;
        }

        .card-c {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 0.25rem;
        }

        .mb-2 {
            margin-bottom: 0.5rem !important;
        }

        .p-3 {
            padding: 1rem !important;
        }

        .justify-content-between-c {
            justify-content: space-between !important;
        }

        .d-flex-c {
            display: flex !important;
        }

        .align-items-center-c {
            align-items: center !important;
        }

        .flex-row-c {
            flex-direction: row !important;
        }

        .icon-c {
            width: 50px;
            height: 50px;
            background-color: #eee;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 39px;
        }

        .bx-c {
            font-family: boxicons !important;
            font-weight: 400;
            font-style: normal;
            font-variant: normal;
            line-height: 1;
            text-rendering: auto;
            display: inline-block;
            text-transform: none;
            speak: none;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .ms-2-c {
            margin-left: 0.5rem !important;
        }

        .c-details span {
            font-weight: 300;
            font-size: 13px
        }

        .mb-0-c {
            margin-bottom: 0 !important;
        }

        .icon-c {
            width: 50px;
            height: 50px;
            background-color: #eee;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 39px
        }

        .badge-c {
            display: inline-block;
            padding: 0.35em 0.65em;
            font-size: .75em;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }

        .badge-c span {
            background-color: #fffbec;
            width: 60px;
            height: 25px;
            padding-bottom: 3px;
            border-radius: 5px;
            display: flex;
            color: #d65d5d;
            justify-content: center;
            align-items: center;
        }

        .mt-5 {
            margin-top: 2rem !important;
        }

        .progress {
            display: flex;
            height: 1rem;
            overflow: hidden;
            font-size: .75rem;
            background-color: #e9ecef;
            border-radius: 0.25rem;
        }

        .mt-3 {
            margin-top: 1rem !important;
        }

        .text1 {
            font-size: 14px;
            font-weight: 600;
        }

        .text2 {
            color: #a5aec0;
        }

        .progress div {
            background-color: red;
        }

    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page_header'); ?>
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-check"></i> Liste des reunions
        </h1>
        <a id="add" data-target="#form" data-toggle="modal" href="#" class="btn btn-success btn-add-new">
            <i class="voyager-plus"></i> <span>ajouter une reunion</span>
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Default box -->
    <div class="page-content browse container-fluid">
        <?php echo $__env->make('voyager::alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="row">
                            <?php $__currentLoopData = $data->donnees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reunion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4">
                                    <div class="card-c p-3 mb-2">
                                        <div class="d-flex-c justify-content-between-c">
                                            <div class="d-flex-c flex-row-c align-items-center-c">
                                                <div class="icon-c"> <i class="bx-c icon voyager-calendar"></i>
                                                </div>
                                                <div class="ms-2-c c-details">
                                                    <h6 class="mb-0-c"><?php echo e($reunion->intitule); ?></h6>
                                                    <span><?php echo e(date_format(date_create($reunion->date_evenement), 'd/m/Y')); ?></span>
                                                    <span> <?php echo e($reunion->heure_evenement); ?></span>
                                                </div>
                                            </div>
                                            <div class="badge-c"><button title="Supprimer"
                                                    id="<?php echo e($reunion->id); ?>" class="btn btn-danger btn-sm delete"
                                                    data-toggle="modal" data-target="#delete">
                                                    <i class="voyager-trash"></i>
                                                </button></div>
                                        </div>
                                        <div class="mt-5">
                                            <h3 class="heading"><?php echo e($reunion->intitule); ?></h3>
                                            <div class="mt-5">
                                                <div>
                                                    <?php echo e($reunion->resume); ?>

                                                </div>
                                                <div
                                                    style="display: flex; justify-content: space-between; align-items: center">
                                                    <div class="mt-3"><?php echo e($reunion->lieu); ?></div>
                                                    <div><button title="Modifier" id="<?php echo e($reunion->id); ?>"
                                                            data-toggle="modal" data-target="#form"
                                                            class="edit btn btn-sm bg-info">
                                                            <i class="voyager-pen"></i>
                                                        </button>
                                                        <a href="<?php echo e(route('reunions.space', $reunion->id)); ?>"
                                                            class="btn btn-sm btn-primary">Parcourir</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form-modal'); ?>
    <form method="post" id="add-form" enctype="multipart/form-data">
        <div class="modal-header flex-column text-center bg-primary">
            <h4 class="modal-title w-100">Ajouter un reunion</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <?php echo csrf_field(); ?>
            <div id="form_result"></div>
            <div class="form-group">
                <label for="intitule">Intitulé : </label>
                <input name="intitule" id="intitule" class="form-control" />
                <span class="text-danger" id="intitule-error"> </span>
            </div>
            <div class="form-group">
                <label for="lieu">Lieu : </label>
                <input name="lieu" id="lieu" class="form-control" />
                <span class="text-danger" id="lieu-error"> </span>
            </div>
            <fieldset>
                <legend>Date et heure évenement</legend>
                <div class="form-group">
                    <label for="date_evenement">Date : </label>
                    <input type="date" name="date_evenement" id="date_evenement" class="form-control" />
                    <span class="text-danger" id="date_evenement-error"> </span>
                </div>
                <div class="form-group">
                    <label for="heure_evenement">Heure : </label>
                    <input type="time" name="heure_evenement" id="heure_evenement" class="form-control" />
                    <span class="text-danger" id="heure_evenement-error"> </span>
                </div>
            </fieldset>
            <div class="form-group">
                <label for="resume">Résumé : </label>
                <textarea class="form-control" name="resume" id="resume" cols="30" rows="10">
            </textarea>
                <span class="text-danger" id="resume-error"> </span>
            </div>

        </div>
        <input name="hidden_id" id="hidden_id" class="form-control" type="hidden" />
        <div class="modal-footer justify-content-center">
            <button type="submit" id="valid" class="btn btn-block btn-primary">valider</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('cscripts'); ?>
    <script src="<?php echo e(asset('assets/back/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/plugins/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/dist/js/treatment.js')); ?>"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
    <script>
        actionData.name = "reunions";

        $(document).ready(function() {
            $('.lo-blk').hide();
            $('.lcs').on('change', function() {
                if (this.value == "other") {
                    $('.lo-blk').show();
                } else {
                    $('.lo-blk').hide();
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.app.template.base',["title" => "Mes reunions"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/back/app/evenements/browser.blade.php ENDPATH**/ ?>