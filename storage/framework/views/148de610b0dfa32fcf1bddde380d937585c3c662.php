<?php $__env->startSection('cstyles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/events.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/slider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/offres.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/publications.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/projets.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-content'); ?>
    <div class="hero-slide owl-carousel site-blocks-cover">
        <?php $__currentLoopData = $data['slides']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $sl = str_replace('\\', '/', $slide->photo);
                $photo = "storage/$sl";
                
            ?>
            <div class="intro-section" style="background-image: url('<?php echo e(asset('' . $photo . '')); ?>');">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                            <h1><?php echo e($slide->title); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="section-bg mt-4 style-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="section-title-underline style-2">
                        <span>Qui sommes nous?</span>
                    </h2>
                </div>
                <div class="col-lg-8">
                    <span class="style-2" style="max-height: 150px; color:white">
                        <?php if($data['about']): ?>
                            <?php echo $data['about']->content; ?>

                        <?php endif; ?>
                    </span>
                    <p><a href="<?php echo e(route('about')); ?>" style="font-weight: bold;">Lire plus</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-6 mb-5">
                    <h2 class="section-title-underline mb-3">
                        <span>Nos évènements</span>
                    </h2>
                    <p style="font-weight: 700; color: black;" >Ici, notre agenda d'évènements planifiés pour les prochains jours</p>
                    <a href="<?php echo e(route('evenements')); ?>" class="text-left" style="font-weight: 700;">Voir tous les evenements</a>
                </div>
            </div>
            <?php if(count($data['events']) > 0): ?>
                <div class="container bg-light p-3">
                    <div class="row">
                        <?php $__currentLoopData = $data['events']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('site.partials.evenement-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="d-flex justify-content-center">
                    <h3 class="text-center text-danger"> Aucun évenement programmé pour l'instant</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-6 mb-5">
                    <h2 class="section-title-underline mb-3">
                        <span>Nos publications</span>
                    </h2>
                    <p style="font-weight: 700; color: black;" >Liste des publications éffectuées</p>
                    <a href="<?php echo e(route('publications')); ?>" class="text-left">Voir toutes nos publications</a>
                </div>
            </div>

            <?php if(count($data['publications']) > 0): ?>
                <div class="container mt-3 mb-3">
                    <div class="row bg-light p-5">
                        <?php $__currentLoopData = $data['publications']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('site.partials.publication-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="d-flex justify-content-center">
                    <h3 class="text-center text-danger"> Aucune publication faite pour l'instant</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-6 mb-5">
                    <h2 class="section-title-underline mb-3">
                        <span>Nos offres</span>
                    </h2>
                    <p style="font-weight: 700; color: black;"  >Liste de nos offres de stage, de thèse et autres offres</p>
                    <a href="<?php echo e(route('offres')); ?>" class="text-left">Voir toutes nos offres</a>
                </div>
            </div>

            <?php if(count($data['offres']) > 0): ?>
                <div class="container-fluid card-offers bg-light my-4 p-3" style="position: relative;">
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                        <?php $__currentLoopData = $data['offres']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-3 m-3 p-2">
                                <div class="card h-100 shadow-sm"> <img
                                        src="<?php echo e(asset('storage/information/October2021/IGRgzQ6o2Ed9jznWwES5.png')); ?>"
                                        class="card-img-top" alt="...">
                                    <div class="label-top shadow-sm"><?php echo e($offre->type); ?></div>
                                    <div class="card-body">
                                        <div class="clearfix mb-3">
                                            <span class="float-start price-hp">Date limite</span>
                                            <span class="float-end">
                                                <a class="text-danger small" href="#">
                                                    <?php echo e(date_format(date_create($offre->fin), 'd/m/Y')); ?>

                                                </a>
                                            </span>
                                        </div>
                                        <h5 class="card-title"><?php echo e($offre->titre); ?></h5>
                                        <div class="text-center my-4"> <a href="#" class="btn btn-warning">Détails</a>
                                        </div>
                                        <div class="clearfix mb-1"> <span class="float-start"><i
                                                    class="far fa-question-circle"></i></span> <span
                                                class="float-end"><i class="fas fa-plus"></i></span> </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="d-flex justify-content-center">
                    <h3 class="text-center text-danger"> Aucun évènement de prévu pour le moment</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-6 mb-5">
                    <h2 class="section-title-underline mb-3">
                        <span style="font-weight: 700; color: black;" >Nos projets en cours</span>
                    </h2>
                    <p style="font-weight: 700; color: black;"  >Nos projets déjà réalisés</p>
                    <a href="<?php echo e(route('projets')); ?>" class="text-left">Voir tous les projets</a>
                </div>
            </div>

            <?php if(count($data['projects']) > 0): ?>
                <div class="container mt-3 mb-3">
                    <div class="row bg-light p-5">
                        <?php $__currentLoopData = $data['projects']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="card p-3 mb-2">
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
                                    <a href="<?php echo e(route('projets.single', $projet->id)); ?>"
                                        class="btn btn-sm btn-primary mt-2">
                                        voir
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="d-flex justify-content-center">
                    <h3 class="text-center text-danger"> Aucun évènement de prévu pour le moment</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-6 mb-5">
                    <h2 class="section-title-underline mb-3">
                        <span>Nos partenaires</span>
                    </h2>
                </div>
            </div>
            <!-- Another variation with a button -->
            <?php if(count($data['partenaires']) > 0): ?>
                <div class="row">
                    <?php $__currentLoopData = $data['partenaires']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patener): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-3 mb-5 mb-lg-5">
                            <div class="feature-1 border person text-center bg-light">
                                <img src="<?php echo e(asset('storage/' . $patener->logo)); ?>" alt="Image" class="img-fluid">
                                <div class="feature-1-content">
                                    <h3 class="text-bold"><?php echo e($patener->titre); ?></h2>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="d-flex justify-content-center text-center">
                    <h4 class="text-danger">Aucun partenaire pour l'instant</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.template.n-base',['title' => 'Accueil'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/site/welcome.blade.php ENDPATH**/ ?>