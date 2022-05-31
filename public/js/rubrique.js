$(function () {

    $('.list-group-item').on('click', onClickRubrique);
    $('.rubdel').click(delRubrique);


    editeform.hide();

    editeform.submit(function (e) {
        e.preventDefault();

        let libelle = inputLibelle.val();
        let contenu = inputContenu.val();
        let compterendu_id = inputCompteId.val();
        let id = inputRubiqueId.val();

        if(!libelle || !contenu){
            alert('Veuillez renseigner tous les champs');
            return;
        }

        $.ajax({
            type: "post",
            url: "/api/rubriques/add",
            data: { libelle, contenu, id, compterendu_id },
            dataType: "json",
            async: false,
            success: function (response) {
                console.log(response.libelle, response.contenu);
                appendRubrique(response, id == '');
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    function appendRubrique({ libelle, contenu, id }, update = false) {
        let item = rubriqueItem({ libelle, contenu, id });
        if (update) {
            $('#rubrique-liste').append(item);
        } else {
            $('#rub' + id).data('libelle', libelle)
            $('#rub' + id).data('contenu', contenu)
            $('#rub' + id).text(libelle);

        }
        editeform.hide();
    }

    $('#add-rubrique').click(function (e) {

        inputRubiqueId.val('');
        inputLibelle.val('');
        inputContenu.val('');

        if (!editeform.is(":visible")) {
            editeform.show();
        }
    });
})