$( document ).ready(function() {
    carregarPerguntas();
});

var json = [];

function carregarPerguntas() {
    $("#perguntas_table > tbody").html("");
    $.get(
        '/TISIV/functions/pergunta.php'   
    ).success(function(resp){
        json = $.parseJSON(resp);
        
        $(json).map(function(i) {
            var myRow = "<tr><td>" + json[i]['id'] + "</td><td>" + json[i]['enunciado'] + "</td><td>" + dificuldade(json[i]['dificuldade'])
            + "</td><td><a href=\"pergunta_tela_editar.php?idpergunta="+ json[i]['id'] + "\"><span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span></a>"
            + "</td><td><a href=javascript:void(0); onclick=excluirPergunta("+ json[i]['id'] +");><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
            $('#perguntas_table tbody').append(myRow);
        });
    });
}


function carregarPergunta(){
    
}

function dificuldade(nivel){
    if(nivel == "F"){
        return "Facíl";
    }else if(nivel == "M"){
        return "Médio";
    }else{
        return "Difícil";
    }
}

function excluirPergunta(id){
    swal({
        title: "Você tem certeza que deseja apagar esse pergunta?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, Apagar!",
        closeOnConfirm: false
    },
    function(){
        $.ajax({
            type: "POST",
            url: "/TISIV/functions/pergunta_excluir.php?id=" + id, 
            success: function(resp){
                if(resp){
                    swal({
                        title: "Apagada!",
                        text: "Pergunta foi apagada.",
                        type: "success",
                        showCancelButton: false,
                        closeOnConfirm: true
                        },
                        function(){
                            window.location.replace("pergunta_tela.php");
                    });
                }else{
                    swal({
                        title: "Erro!",
                        text: "Erro ao apagar pergunta.",
                        type: "warning",
                        showCancelButton: false,
                        closeOnConfirm: true
                        },
                        function(){
                            window.location.replace("pergunta_tela.php");
                    });
                }
            } 
        });
    });
}
