<?php $__env->startSection('page-content'); ?>
    <?php echo $__env->make('site.template.partials._breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('view-content'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.template.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/site/template/base-withbread.blade.php ENDPATH**/ ?>