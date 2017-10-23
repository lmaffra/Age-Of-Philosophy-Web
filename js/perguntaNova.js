$( document ).ready(function() {
    carregarRespostasErradas();
    
    $( "#Nova_Resposta_Errada" ).click(function() {
        if(validaRespostaErrada()) {
            novaRespostaErrada();
        } else {
            sweetAlert("Oops...", "Resposta não pode ser vazia.", "error");
        }
    });
     
    $( "#Nova_Pergunta" ).click(function() {
        if(validaCamposNova()) {
            novaPergunta();
        }else {
            sweetAlert("Oops...", "Faltando um ou mais campos.", "error");
        }
    });
    
    $( "#Nova_Pergunta_Cancelar" ).click(function() {
        history.go(-1);
    });
});

var json = [];

function carregarRespostasErradas() {
    $.get(
        '/TISIV/functions/resposta.php'   
    ).success(function(resp){
         $('#erradas-nova-pergunta').find('option').remove().end();
        json = $.parseJSON(resp);
        $(json).map(function(i) {
            $('#erradas-nova-pergunta').append($('<option>', {
                value: json[i]["id"],
                text: json[i]["resposta"]
            }));
        })
    });
}

function novaRespostaErrada(){
    var data = {
        resposta: $("#resposta-errada-nova-pergunta").val()
    };
        
    jQuery.ajax({
        url: '/TISIV/functions/resposta_cadastrar.php',
        type: 'POST',
        data: data,
        success: function(resp){
            $("#resposta-errada-nova-pergunta").val("");
            carregarRespostasErradas();
        }
    }).error(function() {
        swal("Oops", "Ocorreu algum erro. Favor entrar em contato com a TI.", "error");
    });
}

function novaPergunta(){
     var data = {
        enunciado: $("#enunciado-nova-pergunta").val(),
        dificuldade: $("#dificuldade-nova-pergunta").val(),
        correta: $("#certa-nova-pergunta").val(),
        erradas: $("#erradas-nova-pergunta").val()
    };
        
    jQuery.ajax({
        url: '/TISIV/functions/pergunta_cadastrar.php',
        type: 'POST',
        data: data,
        success: function(resp){
            if(resp){
                swal({
                    title: "Pergunta cadastrada com sucesso!",
                    type: "success",
                    showCancelButton: false,
                    closeOnConfirm: true
                },
                function(){
                    window.location.replace("pergunta_tela.php");
                });
            }else{
                swal("Oops", "Ocorreu algum erro. Favor entrar em contato com a TI.", "error");
            }
        }
    }).error(function() {
        swal("Oops", "Ocorreu algum erro. Favor entrar em contato com a TI.", "error");
    });
}

function validaCamposNova(){
    var validado = true;
    if($("#enunciado-nova-pergunta").val() == ""){
        $("#enunciado-nova-pergunta-form").addClass("has-error");
        validado = false;
    }else{
        $("#enunciado-nova-pergunta-form").removeClass("has-error");
    }
    if($("#dificuldade-nova-pergunta").val() == 0){
        $("#dificuldade-nova-pergunta-form").addClass("has-error");
        validado = false;
    }else{
        $("#dificuldade-nova-pergunta-form").removeClass("has-error");
    }
    if($("#certa-nova-pergunta").val() == ""){
        $("#certa-nova-pergunta-form").addClass("has-error");
        validado = false;
    }else{
        $("#certa-nova-pergunta-form").removeClass("has-error");
    }
    if($("#erradas-nova-pergunta").val() == null || $("#erradas-nova-pergunta").val().length < 4){
        $("#erradas-nova-pergunta-form").addClass("has-error");
        validado = false;
    }else{
        $("#erradas-nova-pergunta-form").removeClass("has-error");
    }
    return validado;
}

function validaRespostaErrada(){
    var validado = true;
    if($("#resposta-errada-nova-pergunta").val() == ""){
        $("#resposta-errada-nova-pergunta-form").addClass("has-error");
        validado = false;
    }else{
        $("#resposta-errada-nova-pergunta-form").removeClass("has-error");
    }
    return validado;
}
