<?php $__env->startComponent('mail::message'); ?>
<?php $__env->startComponent('mail::panel'); ?>
<h1><?php echo e($evenement->intitule); ?></h1>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::panel'); ?>
<p>Bonjour <?php echo e($name); ?></p>
<p>Vous avez été convié à la reunion intitulée : <?php echo e($evenement->intitule); ?></p>
<p>qui se tiendra le <?php echo e($evenement->date_evenement); ?></p>
<?php $__env->startComponent('mail::button', ['url' => route('reunions.space',['id' => $evenement->id]), 'color' => 'success']); ?>
    Voir
<?php echo $__env->renderComponent(); ?>
<?php echo $__env->renderComponent(); ?>

<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/emails/reunions/confirm-reunion.blade.php ENDPATH**/ ?>