<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header justify-content-center bg-primary">
            <h4>Selection du ou des participant(s)</h4>
        </div>

        <div class="modal-body">
            <form id="participant-form">
                @csrf
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

                            @foreach ($data->membres as $part)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="membres[]" id="membre" value="{{ $part->id }}">
                                    </td>
                                    <td>{{ $part->nom . ' ' . $part->prenoms }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <input type="hidden" name="evenement_id" value="{{ $reunion->id }}">
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit" id="add-participant">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts-form-modal')
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
                    url: "{{ route('participant.add') }}",
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
@endpush
