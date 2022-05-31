$('.showJustification').on('click', function (e) {

    const content = $("#justificatif-container")
        .text($(this).data('contenu'))
        .clone()
        .show();

    initModal({ content, onClickAction: null, title: 'Jusficatif' });
    $('#modal').modal('show');
})

//Action du boutton pour ajouter un justificatif
$('.justifier-btn').on('click', function (e) {
    const membreid = $(this).data('membreid');
    const evenementid = $(this).data('evenementid');

    let content = $('#justifier-form-container').clone().show();
    let form = content.children('form');

    form.children('input[name=membre_id]').val(membreid);
    form.children('input[name=evenement_id]').val(evenementid);

    var onClickAction = function (e) {
        form.submit();
    }

    initModal({ content, onClickAction, title: 'Ajouter un justificatif' });

    $('#modal').modal('show');

})