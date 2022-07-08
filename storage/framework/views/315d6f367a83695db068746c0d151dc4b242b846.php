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
            max-height: 250px;
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
            <i class="voyager-check"></i> <?php echo $__env->yieldContent('title'); ?>
        </h1>
        <?php echo $__env->yieldContent('add-items'); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Default box -->
    <div class="page-content browse container-fluid">
        <?php echo $__env->make('voyager::alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="modal" id="delete">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <h4 class="modal-title w-100">Etes vous sure?</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div id="action_result"></div>
                        <p>Voulez vous réelement supprimer cette donnée ? </p>
                    </div>
                    <div class="modal-footer justify-content-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger ok">Valider</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="row">
                            <?php echo $__env->yieldContent('items'); ?>
                        </div>
                    </div>
                    <?php echo $__env->yieldContent('items-link'); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
<?php $__env->stopSection(); ?>



<?php $__env->startSection('javascript'); ?>
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
    <?php echo $__env->yieldContent('add_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/vendor/voyager/template/browse-template.blade.php ENDPATH**/ ?>