<?php $__env->startSection('cstyles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/events.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('view-content'); ?>
    <div class="site-section">

        <?php if($reunions->count()): ?>
            <div class="row p-4">
                <?php $__currentLoopData = $reunions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reunion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-3">
                        <div class="card p-3 mb-2 h-100 d-flex justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="ms-2 c-details">
                                            <h6 class="mb-0">Lieu : <span
                                                    class="text-primary"><?php echo e($reunion->lieu); ?></span>
                                            </h6>
                                            <span>Date : <span
                                                    class="text-danger"><?php echo e($reunion->date_evenement); ?></span></span>
                                            <h3 class="heading pt-3" style="font-size: 24px;"><?php echo e(ucfirst($reunion->intitule)); ?>

                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div>
                                    <a href="<?php echo e(route('site.reunions.browse', $reunion->id)); ?>"
                                        class="btn btn-block btn-success">
                                        voir
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="p-4" ><?php echo e($reunions->links()); ?></div>
        <?php else: ?>
            <div class="d-flex justify-content-center text-center">
                <h4 class="text-danger">Aucune reunions</h4>
            </div>
        <?php endif; ?>

        
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.template.base-withbread', ['title' => 'Les reunions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/site/reunions/single.blade.php ENDPATH**/ ?>