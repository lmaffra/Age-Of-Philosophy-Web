$( document ).ready(function() {
    carregarAlunos();
});

var json = [];

function carregarAlunos() {
    $("#alunos_table > tbody").html("");
    $.get(
        '/TISIV/functions/aluno.php'   
    ).success(function(resp){
        json = $.parseJSON(resp);
        
        $(json).map(function(i) {
            var myRow = "<tr><td>" + json[i]['id'] + "</td><td>" + json[i]['login']
            + "</td><td>" + json[i]['nome']  + "</td><td>" + json[i]['turma'] + "</td><td>" + json[i]['ano']
            + "</td><td><a href=javascript:void(0); onclick=excluirAluno("+ json[i]['id'] + ");><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
            $('#alunos_table tbody').append(myRow);
        });
    }).fail(function() {
    });
}


function excluirAluno(id) {
    swal({
        title: "Você tem certeza que deseja apagar esse aluno?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, Apagar!",
        closeOnConfirm: false
    },
    function(){
        $.ajax({
            type: "POST",
            url: "/TISIV/functions/aluno_excluir.php?id=" + id, 
            success: function(resp){
                if(resp){
                    swal({
                        title: "Apagado!",
                        text: "Aluno foi apagado.",
                        type: "success",
                        showCancelButton: false,
                        closeOnConfirm: true
                        },
                        function(){
                            window.location.replace("aluno_tela.php");
                    });
                }
                else
                {
                    swal({
                        title: "Erro!",
                        text: "Erro ao apagar aluno.",
                        type: "warning",
                        showCancelButton: false,
                        closeOnConfirm: true
                        },
                        function(){
                            window.location.replace("aluno_tela.php");
                    });
                }
            } 
        });
    });
}