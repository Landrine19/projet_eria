let actionData = {
    route : "",
    action : "",
    name : null,
    chemin : null
}
$(document).ready(function(){
    let appId;

    $("#print-btn").click(function(e){
        window.print();
    });

    $('.edit').click(function(e){
        e.preventDefault();
        reset();
        $('#form .modal-title').text('Modification de  '+actionData.name);
        $('#form .modal-footer #valid').text('modifier');
        loadData(this.id);
    });

    $('.delete').click(function(e){
        e.preventDefault();
        appId = this.id;
    });

    $('#delete .ok').click(function(e){
        e.preventDefault();
        deleteData(appId);
    })

    $("#add").click(function(e){
        e.preventDefault();
        reset();
        $('#form .modal-title').text('Ajout de  '+actionData.name);
        $('#form .modal-footer #valid').text('valider');
    })

    $('#add-form').on('submit',function(e){
        e.preventDefault();
        if($(e.target[e.target.length-1]).text() == "valider"){
            let create_action = actionData;
            create_action.action = 'create';
            create_action.route = actionData.name+"."+create_action.action;
            create_action.chemin = "/"+actionData.name+"/"+create_action.action;
            createFunction(create_action,this);
        }else if($(e.target[e.target.length-1]).text() == "modifier"){
            let create_action = actionData;
            create_action.action = 'update';
            create_action.route = actionData.name+"."+create_action.action;
            create_action.chemin = "/"+actionData.name+"/"+create_action.action;
            createFunction(create_action,this);
        }

    })

})



function loadFromDatabase(data){
    $.ajax({
        url : data.chemin,
        type : "GET",
        success : function(data){
            let donnees = data.response_data ? data.response_data : data.data;
            putDataInField(donnees);
        }
    })
}

function putDataInField(data,target=null){
    let tg = target ? target : '#form form'; 
    $(tg+" input").each(function(){
        if(data[$(this).attr('name')]){
            $('#'+$(this).attr('name')).val(data[$(this).attr('name')]);
        }
    });
    $(tg+" select").each(function(){
        if(data[$(this).attr('name')]){
            $('#'+$(this).attr('name')).val(data[$(this).attr('name')]);
        }
    });
    $(tg+" textarea").each(function(){
        if(data[$(this).attr('name')]){
            $('#'+$(this).attr('name')).val(data[$(this).attr('name')]);
        }    
    });
    $(tg+' #hidden_id').val(data.id);
}




function createFunction(data,formElement){
    let elementForm = new FormData(formElement) ;
    $.ajax({
        url : data.chemin,
        type : "POST",
        data : elementForm,
        processData : false,
        contentType : false,
        success : function(data){
            treatment(data);
        },
        error: function(response){
            console.log('Error', response);
        }
    })
}

function treatment(data){
    if(data.success){
        successTreatment(data.message)
    }else{
        let errs = data.response_data ? data.response_data : data.data;
        failTreatment(errs);
    }
}

function successTreatment(successMessage,target=null){
    html = "";
    reset();
    let tg = target ? target :'#form form #form_result';  
    html = '<div class="alert alert-success">' + successMessage + '</div>';
    $(tg).html(html);
    setTimeout(function(){
        location.reload();
    }, 3000);
}

function failTreatment(errors,target=null){
    let tg = target ? target : "#form form";
    if($(tg + " input")){
        $(tg + " input").each(function(){
            $('#'+$(this).attr('name')+"-error").text(errors[$(this).attr('name')]);
        })
    };

    if($(tg+" select"))
        $(tg+" select").each(function(){
            $('#'+$(this).attr('name')+"-error").text(errors[$(this).attr('name')]);
    });

    if($(tg +"textarea"))
        $(tg+" textarea").each(function(){
            $('#'+$(this).attr('name')+"-error").text(errors[$(this).attr('name')]);
    });
 }

function reset(target = null){
    let tg =target ? target : "#add-form";  
    if($(tg+" :input"))
        $(tg+" :input").each(function(){
            if($(this).attr('name') !=="_token"){
                if($(this).attr('name') !=="user_id"){
                    $(this).val("");
                    $('#'+$(this).attr('name')+"-error").text('');
                }
            } //$(this).val("");
        });

    if($(tg+" select")){
        $(tg+" select").each(function(){
            $(this).val("");
            $('#'+$(this).attr('name')+"-error").text('');
        });
    }
    if($(tg+" textarea")){
        $(tg+" textarea").each(function(){
            $(this).val("");
            $('#'+$(this).attr('name')+"-error").text('');
        });
    }
}

function loadData(id){
    appId = id;
    let edit_action = actionData;
    edit_action.action = 'edit';
    edit_action.route = actionData.name+"."+edit_action.action;
    edit_action.chemin = "/"+actionData.name+"/"+edit_action.action+"/"+appId;

    loadFromDatabase(edit_action);
}

function deleteData(id){     
    console.log("/"+actionData.name+"/delete/"+id);
    $.ajax({
        url : "/"+actionData.name+"/delete/"+id,
        type : "GET"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ,
        success : function(data){
            treatmentDelete(data.message);
        },
        error:function(response){
            console.log('Error', response.responseJSON.message);
        }
    })
}

function treatmentDelete(message,target=null){
    html = "";
    reset();
    let tg = target ? target : "#delete #action_result"
    html = '<div class="alert alert-success">' + message + '</div>';
    $(tg).html(html);

    setTimeout(function(){
        location.reload();
    }, 3000);
}
