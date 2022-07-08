<?php $__env->startSection('cstyles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/projets.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('view-content'); ?>
    <div class="site-section">
        <?php if($data->count() > 0): ?>
            <div class="container mt-3 mb-3">
                <div class="row bg-light p-5">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="card p-3 mb-2 h-100 d-flex justify-content-between">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                                            <div class="ms-2 c-details">
                                                <span>Fin : <?php echo e($projet->fin); ?></span>
                                            </div>
                                        </div>
                                        <div class="badge text-success"> <span><?php echo e($projet->statut); ?></span> </div>
                                    </div>
                                    <div class="mt-2">
                                        <h5 class="heading"><?php echo e($projet->titre); ?></h5>
                                    </div>
                                </div>
                                <a href="<?php echo e(route('projets.single', $projet->id)); ?>" class="btn btn- btn-primary mt-2">
                                    voir
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php else: ?>
            <div class="d-flex justify-content-center text-center">
                <h4 class="text-danger">Aucun projet pour l'instant</h4>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.template.base-withbread',['title' => 'Les projets'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/site/projet.blade.php ENDPATH**/ ?>