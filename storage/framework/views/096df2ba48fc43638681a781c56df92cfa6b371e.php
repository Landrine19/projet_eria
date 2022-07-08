<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title> <?php echo e($title); ?> - <?php echo e(config('app.name', 'Laravel')); ?> </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <div class="py-2 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 d-none d-lg-block">
                        <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Vous avez une question?</a> 
                        <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> <?php echo e($infos->phone->value ?? ''); ?></a> 
                        <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> <?php echo e($infos->email->value ?? ''); ?></a> 
                    </div>
                    <div class="col-lg-3 text-right">
                        <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(url('/login')); ?>" class="small mr-3"><span class="icon-unlock-alt"></span> CONNEXION</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('dashboard')); ?>" class="small mr-3"><span class="icon-user"></span> Mon profile</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->yieldContent('content'); ?>    

    </div>
    <?php echo $__env->yieldContent('javascript'); ?>
</body>
</html>
<?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/layouts/app.blade.php ENDPATH**/ ?>