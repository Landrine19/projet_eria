<div id="justifier-form-container" style="display: none">
    <form method="POST" action="<?php echo e(route('justifier')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="evenement_id">
        <input type="hidden" name="membre_id">
        <textarea type="text" name="justification" class="form-control" id="" cols="30" rows="10">
        </textarea>
    </form>
</div>
<?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/back/app/evenements/modals/justifier.blade.php ENDPATH**/ ?>