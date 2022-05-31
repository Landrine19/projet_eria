<div id="justifier-form-container" style="display: none">
    <form method="POST" action="{{ route('justifier') }}">
        @csrf
        <input type="hidden" name="evenement_id">
        <input type="hidden" name="membre_id">
        <textarea type="text" name="justification" class="form-control" id="" cols="30" rows="10">
        </textarea>
    </form>
</div>
