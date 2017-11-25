$( document ).ready(function() {
    
    $('#tipo-resposta-correta option[value=1]').prop('selected', true);
    
    carregarRespostasErradas();

    $('#tipo-resposta-correta').change(function() {
        $('#certa-nova-pergunta-form').toggle();
        $('#certa-sel-pergunta-form').toggle();
        
    });
    
    $( "#Nova_Resposta_Errada" ).click(function() {
        if(validaRespostaErrada()) {
            novaRespostaErrada();
        } else {
            sweetAlert("Oops...", "Resposta não pode ser vazia.", "error");
        }
    });
     
    $( "#Salvar_Pergunta" ).click(function() {
        if(validaCamposNova()) {
            salvarPergunta();
        }else {
            sweetAlert("Oops...", "Faltando um ou mais campos.", "error");
        }
    });
    
    $( "#Salvar_Pergunta_Cancelar" ).click(function() {
        history.go(-1);
    });
});

var json = [];

function carregarDadosPergunta() {
     $.get(
        '/TISIV/functions/pergunta_id.php?idpergunta='+ id_pergunta   
    ).success(function(resp){
        json = $.parseJSON(resp);
        $("#enunciado-nova-pergunta").val(json["enunciado"]);
        $('#dificuldade-nova-pergunta option[value=' + json["dificuldade"] + ']').prop('selected', true);
        $('#certa-sel-pergunta option[value=' + json["id_correta"] + ']').prop('selected', true); 
        $.each(json["erradas"], function(i,id_errada) {
            $("#erradas-nova-pergunta option[value='" + id_errada + "']").prop("selected", true);
        });
        
    });
}

function carregarRespostasErradas() {
    $.get(
        '/TISIV/functions/resposta.php'   
    ).success(function(resp){
         $('#erradas-nova-pergunta').find('option').remove().end();
        json = $.parseJSON(resp);
        var options = [];
        $(json).map(function(i) {
                options.push('<option value="' + json[i]["id"] + '"' + '>' + json[i]["resposta"] + '</option>');
        })
            $('#erradas-nova-pergunta').append(options.join(''));
            carregarOpcoesRespostasCerta();
    });
}

function carregarOpcoesRespostasCerta() {
    $.get(
        '/TISIV/functions/resposta.php'   
    ).success(function(resp){
        json = $.parseJSON(resp);
        var options = [];
        $(json).map(function(i) {
            options.push('<option value="' + json[i]["id"] + '"' + '>' + json[i]["resposta"] + '</option>');
        })
        $('#certa-sel-pergunta').append(options.join(''));
        carregarDadosPergunta();
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

function salvarPergunta(){
     var data = {
        id: id_pergunta,
        enunciado: $("#enunciado-nova-pergunta").val(),
        dificuldade: $("#dificuldade-nova-pergunta").val(),
        novaExistente: $('#tipo-resposta-correta').val(),
        corretaNova: $("#certa-nova-pergunta").val(),
        corretaSel: $("#certa-sel-pergunta").val(),
        erradas: $("#erradas-nova-pergunta").val()
    };
        
    jQuery.ajax({
        url: '/TISIV/functions/pergunta_salvar.php',
        type: 'POST',
        data: data,
        success: function(resp){
            if(resp){
                swal({
                    title: "Pergunta alterada com sucesso!",
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
    //Enunciado
    if($("#enunciado-nova-pergunta").val() == ""){
        $("#enunciado-nova-pergunta-form").addClass("has-error");
        validado = false;
    }else{
        $("#enunciado-nova-pergunta-form").removeClass("has-error");
    }
    //Dificuldade
    if($("#dificuldade-nova-pergunta").val() == 0){
        $("#dificuldade-nova-pergunta-form").addClass("has-error");
        validado = false;
    }else{
        $("#dificuldade-nova-pergunta-form").removeClass("has-error");
    }
    //Respota correta nova ou existente
    if($('#tipo-resposta-correta').val() == 0){
        if($("#certa-nova-pergunta").val() == ""){
            $("#certa-nova-pergunta-form").addClass("has-error");
            validado = false;
        }else{
            $("#certa-nova-pergunta-form").removeClass("has-error");
        }   
    }else{
        if($("#certa-sel-pergunta").val() == 0){
            $("#certa-sel-pergunta-form").addClass("has-error");
            validado = false;
        }else{
            $("#certa-sel-pergunta-form").removeClass("has-error");
        }   
    }
    //respostas Erradas
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
