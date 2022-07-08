 <!-- Default box -->
 <?php $__env->startSection('head'); ?>
 <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e((asset('assets/back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'))); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page_header'); ?>
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-check"></i> Liste des projets
        </h1>
        <a id="add" data-target="#form" data-toggle="modal" href="#" class="btn btn-success btn-add-new">
            <i class="voyager-plus"></i> <span>ajouter un projet</span>
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
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                <tr>
                                    <th class="text-center">Titre</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">Début</th>
                                    <th class="text-center">Fin</th>
                                    <th></th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $__currentLoopData = $data->donnees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($projet->titre); ?></td>
                                        <td><?php echo e($projet->statut); ?></td>
                                        <td><?php echo e($projet->debut); ?></td>
                                        <td><?php echo e($projet->fin); ?></td>
                                        <td>
                                            <button title="Changer statut" id="<?php echo e($projet->id); ?>" data-toggle="modal" data-target="#state-modal" class="changeState btn btn-sm bg-success">
                                                <i class="voyager-check"></i>
                                            </button>
                                            <button  title="Supprimer" id="<?php echo e($projet->id); ?>" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#delete">
                                                <i class="voyager-trash"></i>
                                            </button>
                                            <button title="Modifier" id="<?php echo e($projet->id); ?>" data-toggle="modal" data-target="#form" class="edit btn btn-sm bg-info">
                                                <i class="voyager-pen"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Titre</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">Début</th>
                                    <th class="text-center">Fin</th>
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

<div class="modal" id="state-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center bg-primary">
                   <h4>Changer statut</h4>
                </div>
                <div class="modal-body bg-light">
                    <form action="<?php echo e(route('projet.state')); ?>" id="state-form" method="post"> 
                        <div id="result"></div>
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                           <label for="">Statut du projet</label>
                           <select name="statut" id="statut" class="form-control">
                                <option value="">CHOISIR UN STATUT</option>
                                <option value="En cours">En cours</option>
                                <option value="Terminé">Terminé</option>
                                <option value="En pause">En pause</option>
                           </select>
                        </div>
                        <input type="hidden" name="hidden_id" id="hidden_id">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form-modal'); ?>
<form method="post" id="add-form" enctype="multipart/form-data">
    <div class="modal-header flex-column text-center bg-primary">
        <h4 class="modal-title w-100">Ajouter un projet</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
        <?php echo csrf_field(); ?>
        <div id="form_result"></div>
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
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        
        });
    </script>
    <script>
        actionData.name = "projet";

        $(document).ready(function(){

            $('.changeState').click(function(e){
                e.preventDefault();
                $('#state-form #hidden_id').val(this.id);    
            })
            
            $('#state-form').on('submit',function(e){
                e.preventDefault();
                let elementForm = new FormData(this);
                $.ajax({
                    route: '<?php echo e(route("projet.state")); ?>',
                    type : 'POST',
                    data : elementForm,
                    processData : false,
                    contentType : false,
                    success : function(data){
                        if(data.success) {
                            html = "";
                            html = '<div class="alert alert-success">' + data.message + '</div>';
                            $('#state-form #result').html(html);

                            setTimeout(function(){
                                $('#state-form #result').html("");
                                location.reload();
                            }, 3000);    
                        }
                    }  
                })     
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app.template.base',["title" => "Mes projets"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/back/app/projets/browser.blade.php ENDPATH**/ ?>