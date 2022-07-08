<div class="col-md-4">
    <div class="card p-3 mb-2 h-100 d-flex justify-content-between">
        <div>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <div class="ms-2 c-details">
                        <h6 class="mb-0">Journal : <span
                                class="text-primary"><?php echo e($publication->journal); ?></span>
                        </h6>
                        <span>Année de parution : <span
                                class="text-danger"><?php echo e($publication->annee_publication); ?></span></span>
                    </div>
                </div>
            </div>
            <h3 class="heading pt-3" style="font-size: 24px;"><?php echo e(ucfirst($publication->titre)); ?></h3>
        </div>
        <div class="mt-3">
            <div>
                <a href="<?php echo e(route('publications.single', $publication->id)); ?>" class="btn btn-block btn-success">
                    voir
                </a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/site/partials/publication-item.blade.php ENDPATH**/ ?>