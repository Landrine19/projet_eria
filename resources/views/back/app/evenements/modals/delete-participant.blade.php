<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header justify-content-center bg-primary">
            <h4>Suppression</h4>
        </div>
        <div class="modal-body bg-light">
            <div id="result"></div>
            Voulez vous retirer ce membre de la reunion
        </div>
        <form id="delete-form" action="">
            @csrf
            <input name="membre_id" id="membre" type="hidden">
            <input name="evenement_id" value="{{ $reunion->id }}" type="hidden">
        </form>
        <div class="modal-footer pull-left">
            <button class="btn btn-sm btn-danger ok">valider</button>
            <button class="btn btn-sm btn-secondary" data-dismiss="modal">annuler</button>
        </div>
    </div>
</div>

@push('scripts-form-modal')
    <script>
        $(function() {
            $('#delete-form').on('submit', function(e) {
                e.preventDefault();
                let elementForm = new FormData(this);
                $.ajax({
                    url: "{{ route('participant.delete') }}",
                    type: 'POST',
                    data: elementForm,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.success) {
                            html = "";
                            html = '<div class="alert alert-success">' + data.message +
                                '</div>';
                            $('#delete-form #result').html(html);

                            setTimeout(function() {
                                $('#delete-form #result').html("");
                                location.reload();
                            }, 1000);
                        }
                    }
                });
            });
        })
    </script>
@endpush
