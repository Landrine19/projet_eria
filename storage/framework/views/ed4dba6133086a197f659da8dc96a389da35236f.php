<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header justify-content-center bg-primary">
            <h4>
                <?php if($reunion->resume): ?>
                    Modifier le résumé
                <?php else: ?>
                    Ajouter le résumé
                <?php endif; ?>
            </h4>
        </div>
        <div class="modal-body bg-light">
            <form id="resume-form">
                <div id="result"></div>
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <textarea value="<?php echo e($reunion->resume); ?>" name="resume" id="resume" cols="30" class="form-control" rows="10">

                    </textarea>
                </div>
                <input type="hidden" name="evenement_id" value="<?php echo e($reunion->id); ?>">
                <div class="form-group">
                    <button class="btn btn-primary btn-block ok" type="submit">
                        valider
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts-form-modal'); ?>
    <script>
        $(function() {
            $('#resume-form').on('submit', function(e) {
                e.preventDefault();
                let elementForm = new FormData(this);
                $.ajax({
                    url: "<?php echo e(route('evenements.resume')); ?>",
                    type: 'POST',
                    data: elementForm,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.success) {
                            html = "";
                            html = '<div class="alert alert-success">' + data.message +
                                '</div>';
                            $('#resume-form #result').html(html);

                            setTimeout(function() {
                                $('#resume-form #result').html("");
                                location.reload();
                            }, 3000);
                        }
                    }
                })
            });
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/back/app/evenements/modals/edit-add-resume.blade.php ENDPATH**/ ?>