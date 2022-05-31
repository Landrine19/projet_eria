$(function () {
    
    if (inputCompteId.val()) {
        compteLibelle.show();
        orderForm.hide();
    } else {
        hideCompteRendu();
    }

    orderForm.on('submit', function (e) {
        e.preventDefault();

        var libelle = inputCompteLibelle.val();
        var id = inputCompteId.val();
        var evenement_id = eventInput.val();

        if (libelle == '') {
            alert('Veuillez renseigner une valeur');
        }

        $.ajax({
            type: "post",
            url: "/api/compterendus/add",
            data: { libelle, id, evenement_id },
            dataType: "json",
            success: function (response) {
                showCompteItem(response)
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    editcmptelibelle.on('click',function(e){
        compteLibelle.parent().hide();
        orderForm.show();
    });

    deletecmptelibelle.on('click', function(e){
        $('#delete-compterendu').modal('show');
    }); 

    $('#deleteRub').on('click', function(){
        let id = deletecmptelibelle.data('id');

        $.ajax({
            type: "get",
            url: "/api/compterendus/delete/"+id,
            dataType: "json",
            success: function (response) {
                if(response.id){
                    window.location.reload();
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    })

});

function hideCompteRendu() {
    compteLibelle.parent().hide();
    addRubriqueBtn.prop('disabled', true);
    orderForm.show();
}

function showCompteItem(data) {
    addRubriqueBtn.prop('disabled', false);
    inputCompteId.val(data.id);
    compteLibelle.text(data.libelle);
    orderForm.hide();
    compteLibelle.parent().show();
    inputCompteId.show();
}