
var inputCompteId, compteLibelle, editeform, inputLibelle, inputContenu, inputRubiqueId, inputCompteLibelle;
var orderForm, eventInput, editcmptelibelle, addRubriqueBtn, deletecmptelibelle;
var i = 0;
var rubriques = [];
$(function () {
    deletecmptelibelle = $('#deletecmptelibelle');
    addRubriqueBtn = $('#add-rubrique');
    inputCompteId = $('#inputCompteId');
    compteLibelle = $('#compterendu_libelle');
    orderForm = $('#orderForm');
    editeform = $('#edit-form');
    inputLibelle = $('#libelle')
    inputContenu = $('#contenu')
    inputRubiqueId = $('#rubriqueId');
    inputCompteLibelle = $('#inputCompteLibelle')
    eventInput = $('#eventInput');
    editcmptelibelle = $("#editcmptelibelle");
})



function rubriqueItem(params, action = null) {
    var item = $("<button type='button' class='list-group-item list-group-item-action rub-style'></button>")
    item.text(params.libelle);
    item.attr({
        'data-libelle': params.libelle,
        'data-contenu': params.contenu,
        'data-id': params.id,
        'id': 'rub' + params.id
    });

    let supp = $("<a class='btn btn-danger rubdel' data-id=" + params.id + " style='font-size: 10px;'><span class='voyager-trash'></span></a>")
    supp.on('click', delRubrique)

    $(item).click(onClickRubrique);

    var div = $('<div></div>');
    div.append(item);
    div.append(supp);

    return div;
}

function onClickRubrique() {
    console.log($(this));
    inputLibelle.val($(this).data('libelle'))
    inputContenu.val($(this).data('contenu'))
    inputRubiqueId.val($(this).data('id'));
    editeform.show();
}

function delRubrique(e) {
    let id = $(this).data('id');
    let current = $(this);

    let onClickAction = function (e) {
        $.ajax({
            type: "get",
            url: "/api/rubriques/delete/" + id,
            dataType: "json",
            async: false,
            success: function (response) {
                console.log(response);
                if (response.id) {
                    current.parent().remove();
                    $("#modal").modal('hide');
                }
            },
            error: function (error) {
                console.log(error);
            }
        })
    }

    initModal({ content: 'Voulez-vous supprimer cette rubrique ? ',
                onClickAction,
                title: "Suppression d'une rubrique" 
            });


    $("#modal").modal('show');

    return;
}