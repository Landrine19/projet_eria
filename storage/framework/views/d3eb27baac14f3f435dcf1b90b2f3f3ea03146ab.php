<?php $__env->startSection('view-content'); ?>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h2 class="section-title-underline mb-5">
                        <span>DETAILS SUR LA REUNION</span>
                    </h2>

                    <p><strong class="text-black d-block">Titre:</strong> <?php echo e($reunion->intitule); ?></p>
                    <p class="mb-5">
                        <strong class="text-black d-block">Date:</strong>
                        <?php echo e($reunion->date_evenement); ?>

                    </p>
                    <p class="mb-5">
                        <strong class="text-black d-block">Résumé:</strong>
                        <?php echo e($reunion->resume); ?>

                    </p>

                </div>
                <div class="col-lg-5">
                    <?php if($reunion->fichiers->count()): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Fichiers</h3>
                            </div>
                            <div class="col-md-12">
                                <ul>
                                    <?php $__currentLoopData = $reunion->fichiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fichier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <span>
                                                <span class="voyager-file-text" style="font-size: 20px;"></span>
                                                <a href="/storage/<?php echo e($fichier->chemin); ?>"><?php echo e($fichier->name); ?></a>
                                            </span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($reunion->compterendus->count()): ?>
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom: 18px;">
                                <h2>Compte rendus</h2>
                            </div>
                            <?php $__currentLoopData = $reunion->compterendus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-12">
                                    <h4><?php echo e($cp->libelle); ?></h4>
                                </div>
                                <ul>
                                    <?php $__currentLoopData = $cp->rubriques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rubrique): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($rubrique->libelle); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <hr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.template.base-withbread', ['title' => 'Information sur publication'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/site/reunions/browse.blade.php ENDPATH**/ ?>