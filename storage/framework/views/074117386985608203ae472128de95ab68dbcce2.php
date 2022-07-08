<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header justify-content-center bg-primary">
            <h4>Selection du ou des participant(s)</h4>
        </div>

        <div class="modal-body">
            <form id="participant-form">
                <?php echo csrf_field(); ?>
                <div id="result"></div>

                <div class="table-responsive">
                    <table id="dataTable2" class="table table-stripped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nom & prénom(s)</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $data->membres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="membres[]" id="membre" value="<?php echo e($part->id); ?>">
                                    </td>
                                    <td><?php echo e($part->nom . ' ' . $part->prenoms); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <input type="hidden" name="evenement_id" value="<?php echo e($reunion->id); ?>">
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit" id="add-participant">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts-form-modal'); ?>
    <script>
        $(document).ready(function() {
            $('#participant-form').on('submit', function(e) {
                $('#add-participant').prop('disabled', true);
                $('#add-participant').addClass('btn-danger');
                $('#add-participant').text('Chargement...')
                e.preventDefault();
                console.log($('#membre').val());
                let elementForm = new FormData(this);
                $.ajax({
                    url: "<?php echo e(route('participant.add')); ?>",
                    type: 'POST',
                    data: elementForm,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('#add-participant').prop('disabled', false);
                        $('#add-participant').removeClass('btn-danger');
                        $('#add-participant').text('Ajouter')
                        if (data.success) {
                            html = "";
                            html = '<div class="alert alert-success">' + data.message +
                                '</div>';
                            $('#participant-form #result').html(html);

                            setTimeout(function() {
                                $('#participant-form #result').html("");
                                location.reload();
                            }, 2000);
                        }
                    }
                })
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/back/app/evenements/modals/add-participant.blade.php ENDPATH**/ ?>