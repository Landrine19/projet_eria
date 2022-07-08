<div class="row">
    <div class="col-md-12">
        <?php if($notExpired): ?>
            <div class="container-fluid">
                <h1 class="page-title">
                    <i class="voyager-check"></i> Participants
                </h1>
                <a title="ajouter un participant" class="btn btn-primary" data-toggle="modal"
                    data-target="#participant-modal">
                    <i class="voyager-plus"></i>
                    Ajouter un participant
                </a>
            </div>
        <?php else: ?>
            <div style="margin-top: 40px; margin-bottom: 30px;">
                <h3>Participants</h3>
            </div>
        <?php endif; ?>

        <div class="panel">
            <div class="panel-body">
                <table id="dataTable" class="table table-stripped table-bordered">
                    <thead class="bg-dark">
                        <tr>
                            <th>Nom & Prénom(s)</th>
                            <th>Spécialité</th>
                            <th>Présence?</th>
                            <?php if($notExpired): ?>
                                <?php if($reunion->role == 'moderateur'): ?>
                                    <th></th>
                                <?php endif; ?>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $reunion->membres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($membre->nom . ' ' . $membre->prenoms); ?></td>
                                <td><?php echo e($membre->specialite); ?></td>
                                <td>
                                    <?php if($membre->pivot->absence): ?>
                                        Absent
                                    <?php else: ?>
                                        Présent
                                    <?php endif; ?>

                                    <?php if($notExpired): ?>
                                        <?php if($user->id == $membre->id || $isModerateur): ?>
                                            <div class="btn-group btn-group-sm p-2">
                                                <?php if($membre->pivot->absence == 1): ?>
                                                    <a class="btn btn-sm btn-success mr-2"
                                                        href="/present/<?php echo e($membre->id); ?>/<?php echo e($reunion->id); ?>">
                                                        <i class="voyager-check"></i>
                                                    </a>
                                                    <?php if($membre->pivot->justificatif): ?>
                                                        <button style="margin-left: 12px;"
                                                            data-contenu="<?php echo e($membre->pivot->justificatif); ?>"
                                                            class="btn btn-success m-2 showJustification">
                                                            <i class="voyager-documentation"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <button class="justifier-btn btn btn-sm btn-warning mr-2"
                                                        data-membreid="<?php echo e($membre->id); ?>"
                                                        data-evenementid="<?php echo e($reunion->id); ?>">
                                                        <i class="voyager-x"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <?php if($notExpired): ?>
                                    <td class="text-right py-0 align-middle">
                                        <?php if($isModerateur && $membre->id != $user->id): ?>
                                            <div class="btn-group btn-group-sm p-2">
                                                <button id="<?php echo e($membre->id); ?>" data-toggle="modal" title="suppression"
                                                    data-target="#delete-modal" class="btn btn-sm btn-danger mr-1 del">
                                                    <i class="voyager-trash"></i>
                                                </button>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="border: 2px solid black;">
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="container-fluid">
            <h1 class="page-title">
                <i class="voyager-check"></i> Pièce jointes
                <?php if($reunion->fichiers->count() == 0): ?>
                    <span class="text-danger" style="margin-left: 18px;"> Aucune pièce jointe</span>
                <?php endif; ?>
            </h1>
            <?php if($isModerateur): ?>)
                <?php if($notExpired): ?>
                    <form action="<?php echo e(route('fichiers.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="evenement_id" value="<?php echo e($reunion->id); ?>">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <input type="text" placeholder="libelle" class="form-control" name="name">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="file" style="padding: 10px;" name="fichier">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-primary" type="submit">Joindre</button>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php if($reunion->fichiers->count() > 0): ?>
            <div class="panel">
                <div class="panel-body">
                    <table id="dataTable" class="table table-stripped table-bordered">
                        <thead class="bg-dark">
                            <tr>
                                <th>Libelle</th>
                                <th>Fichiers</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reunion->fichiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fichier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($fichier->name); ?></td>
                                    <td><a href="/storage/<?php echo e($fichier->chemin); ?>"><span class="voyager-file-text"
                                                style="font-size: 20px;"></span></a></td>
                                    <td><a href="<?php echo e(route('fichiers.delete', ['id' => $fichier->id])); ?>"
                                            class="btn btn-danger">supprimer</a></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/back/app/evenements/ajouter-participant.blade.php ENDPATH**/ ?>