<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header justify-content-center bg-primary">
            <h4>
                @if ($reunion->resume)
                    Modifier le résumé
                @else
                    Ajouter le résumé
                @endif
            </h4>
        </div>
        <div class="modal-body bg-light">
            <form id="resume-form">
                <div id="result"></div>
                @csrf
                <div class="form-group">
                    <textarea value="{{ $reunion->resume }}" name="resume" id="resume" cols="30" class="form-control" rows="10">

                    </textarea>
                </div>
                <input type="hidden" name="evenement_id" value="{{ $reunion->id }}">
                <div class="form-group">
                    <button class="btn btn-primary btn-block ok" type="submit">
                        valider
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts-form-modal')
    <script>
        $(function() {
            $('#resume-form').on('submit', function(e) {
                e.preventDefault();
                let elementForm = new FormData(this);
                $.ajax({
                    url: "{{ route('evenements.resume') }}",
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
@endpush
