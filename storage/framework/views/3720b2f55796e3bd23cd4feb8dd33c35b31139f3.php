<?php
$data = App\Models\Membre::paginate(6);
?>

<?php $__env->startSection('title'); ?>
    Liste des membres
<?php $__env->stopSection(); ?>

<?php $__env->startSection('add-items'); ?>
    <a href="/admin/membres/create" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Ajouter membre</span>
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('items'); ?>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <div class="card-c p-3 mb-2">
                <div class="d-flex-c align-items-center-c" style="justify-content: center; flex-direction: column;">
                    <div><img src="<?php echo e(asset('storage/' . $item->user->avatar)); ?>" width="100px" height="100px"></div>
                    <h4><?php echo e(ucfirst($item->nom) . ' ' . ucfirst($item->prenoms)); ?></h4>
                </div>

                <a style="position: absolute; right: 5px; top: 5px;" title="Supprimer" id="<?php echo e($item->id); ?>" class="btn btn-danger btn-sm delete" data-toggle="modal"
                    data-target="#delete">
                    <i class="voyager-trash"></i>
                </a>

                <div style="margin-top: 10px;">
                    <div>
                        <div style="display: flex; justify-content: center; align-items: center">
                            <div><a href="/admin/membres/<?php echo e($item->id); ?>/edit" class="btn btn-sm bg-info">
                                    <i class="voyager-pen"></i>
                                </a>
                                <a href="/admin/membres/<?php echo e($item->id); ?>" class="btn btn-sm btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('items-link'); ?>
    <?php echo e($data->links()); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('add_scripts'); ?>
    <script>
        actionData.name = "membres";
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.voyager.template.browse-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/vendor/voyager/membres/browse.blade.php ENDPATH**/ ?>