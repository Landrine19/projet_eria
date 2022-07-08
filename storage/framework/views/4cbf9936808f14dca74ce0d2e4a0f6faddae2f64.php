<?php
$rendus = App\Http\Controllers\CompterenduController::all();
$compteRendu = $reunion->compterendus;
$compteRenduexist = $compteRendu->count() > 0;
?>

<div>
    <h1>COMPTE RENDU</h1>
    <div class="row">
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-10" style="margin-bottom: 0px;">
                    <?php if($isModerateur): ?>
                        <?php if($notExpired): ?>
                            <form action="#" id="orderForm">
                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <label for="#" class="form-label">Ordre du jour</label>
                                        <?php
                                            $libelle = $compteRenduexist ? $compteRendu->first()->libelle : null;
                                        ?>
                                        <input type="text" class="form-control" id="inputCompteLibelle"
                                            value="<?php echo e($libelle); ?>">
                                        <?php
                                            $val = $compteRenduexist ? $compteRendu->first()->id : null;
                                        ?>
                                        <input type="hidden" name="id" id="inputCompteId" value="<?php echo e($val); ?>">
                                        <input type="hidden" name="evenement_id" value="<?php echo e($reunion->id); ?>"
                                            id="eventInput">
                                    </div>
                                    <div class="col-md-2" style="margin-top: 20px;">
                                        <button class="btn btn-primary" type="submit">Valider</button>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                        $lib = $compteRenduexist ? $compteRendu->first()->libelle : '';
                        $id = $compteRenduexist ? $compteRendu->first()->id : '';
                    ?>
                    <h2>
                        <span id="compterendu_libelle"><?php echo e($lib); ?></span>
                        <?php if($isModerateur): ?>
                            <button style="font-size: 18px; margin-left: 12px;" id="editcmptelibelle">
                                <span class="voyager-pen"></span>
                            </button>
                            <button style="font-size: 12px; margin-left: 12px;" class="btn btn-danger"
                                data-id="<?php echo e($id); ?>" id="deletecmptelibelle" data-target="#delete-compterendu">
                                <span class="voyager-trash"></span>
                            </button>
                        <?php endif; ?>
                    </h2>

                    <h3>Rubrique(s)
                        <?php if($isModerateur): ?>
                            <?php if($notExpired): ?>
                                <button <?php echo e($compteRenduexist ? '' : 'disabled'); ?> class="btn btn-primary"
                                    id="add-rubrique">
                                    <i class="voyager-plus" style="font-size: 18px;"></i>
                                </button>
                            <?php endif; ?>
                        <?php endif; ?>
                    </h3>
                </div>
                <div class="col-md-8">
                    <ul class="list-group">
                        <?php
                            $rubriques = null;
                            if ($compteRenduexist && $compteRendu->first()->rubriques->count() > 0) {
                                $rubriques = $compteRendu->first()->rubriques;
                            }
                        ?>
                        <div class="list-group" id="rubrique-liste">
                            <?php if($rubriques): ?>
                                <?php $__currentLoopData = $rubriques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rubrique): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        <button type='button' class='list-group-item list-group-item-action rub-style'
                                            id="rub<?php echo e($rubrique->id); ?>" data-id="<?php echo e($rubrique->id); ?>"
                                            data-libelle="<?php echo e($rubrique->libelle); ?>"
                                            data-contenu="<?php echo e($rubrique->contenu); ?>"><?php echo e($rubrique->libelle); ?>

                                        </button>
                                        <?php if($isModerateur): ?>
                                            <a class="btn btn-danger rubdel" data-id="<?php echo e($rubrique->id); ?>"
                                                style="font-size: 10px;"><span class="voyager-trash"></span></a>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5" style="margin-left: 12px">
            <form action="#" id="edit-form">
                <input type="hidden" id="rubriqueId">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="" class="form-label">Rubrique</label>
                        <input name="libelle" type="text" class="form-control" id="libelle">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="" class="form-label">Contenu</label>
                        <textarea name="contenu" class="form-control" id="contenu" cols="30" rows="8"></textarea>
                    </div>
                </div>
                <?php if($isModerateur): ?>
                    <div><button class="btn btn-primary" type="submit">Valider</button></div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="delete-compterendu">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-primary">
                <h4>Suppression</h4>
            </div>
            <div class="modal-body bg-light">Voulez-vous effectuer cette operation</div>
            <form id="delete-form" action="">
                <?php echo csrf_field(); ?>
                <input name="membre_id" id="membre" type="hidden">
                <input name="evenement_id" value="<?php echo e($reunion->id); ?>" type="hidden">
            </form>
            <div class="modal-footer pull-left">
                <button class="btn btn-sm btn-danger" id="deleteRub">valider</button>
                <button class="btn btn-sm btn-secondary" data-dismiss="modal">annuler</button>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/back/app/evenements/compterendu/compterendu.blade.php ENDPATH**/ ?>