$( document ).ready(function() {
    carregarTurmas();

    $( "#salvarNovaTurma" ).click(function() {
        if(validaCampos()) {
            cadastrarTurmas();
        }else {
            sweetAlert("Oops...", "Faltando um ou mais campos.", "error");
        }
    });
    
    $( "#salvarEditarTurma" ).click(function() {
        editarTurma();
    });

});

var json = [];

var turmaSelecionada = [];

function carregarTurmas() {
    $("#turmas_table > tbody").html("");
    $.get(
        '/TISIV/functions/turma.php'   
    ).success(function(resp){
        json = $.parseJSON(resp);
        
        $(json).map(function(i) {
            var myRow = "<tr><td>" + json[i]['id'] + "</td><td>" + json[i]['turma']
            + "</td><td><a href=javascript:void(0); onclick=carregarTurma("+ i +");><span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span></a>"
            + "</td><td><a href=javascript:void(0); onclick=excluirTurma("+ json[i]['id'] +");><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
            $('#turmas_table tbody').append(myRow);
        });
    });
}

function cadastrarTurmas(){
    
    var data = {
            turma: $("#nomeNovaTurma").val()
        };
        
    jQuery.ajax({
            url: '/TISIV/functions/turma_cadastrar.php',
            type: 'POST',
            data: data,
            success: function(resp){
            if(resp){
                swal({
                title: "Turma cadastrada com sucesso!",
                type: "success",
                showCancelButton: false,
                closeOnConfirm: true
                },
                function(){
                    window.location.replace("turma_tela.php");
                });
            }else{
                swal("Oops", "Ocorreu algum erro. Favor entrar em contato com a TI.", "error");
            }
        }
    }).error(function() {
        swal("Oops", "Ocorreu algum erro. Favor entrar em contato com a TI.", "error");
    });

}

function carregarTurma(i) {
    turmaSelecionada = json[i];
    $('#editarTurmaModal').modal('show');
    var turma = "" + turmaSelecionada['turma'];
    $("#tituloEditarTurma").html("Editar Turma: " + turma);
}

function editarTurma() {
    var data = {
            id: turmaSelecionada["id"],
            turma: $("#nomeEditarTurma").val()
        };
        
    jQuery.ajax({
            url: '/TISIV/functions/turma_editar.php',
            type: 'POST',
            data: data,
            success: function(resp){
            if(resp){
                swal({
                title: "Turma editada com sucesso!",
                type: "success",
                showCancelButton: false,
                closeOnConfirm: true
                },
                function(){
                    window.location.replace("turma_tela.php");
                });
            }else{
                swal("Oops", "Ocorreu algum erro. Favor entrar em contato com a TI.", "error");
            }
        }
    }).error(function() {
        swal("Oops", "Ocorreu algum erro. Favor entrar em contato com a TI.", "error");
    });
}

function excluirTurma(id) {
    swal({
        title: "Você tem certeza que deseja apagar esse turma?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, Apagar!",
        closeOnConfirm: false
    },
    function(){
        $.ajax({
            type: "POST",
            url: "/TISIV/functions/turma_excluir.php?id=" + id, 
            success: function(resp){
                if(resp){
                    swal({
                        title: "Apagado!",
                        text: "Turma foi apagado.",
                        type: "success",
                        showCancelButton: false,
                        closeOnConfirm: true
                        },
                        function(){
                            window.location.replace("turma_tela.php");
                    });
                }
                else
                {
                    swal({
                        title: "Erro!",
                        text: "Erro ao apagar turma.",
                        type: "warning",
                        showCancelButton: false,
                        closeOnConfirm: true
                        },
                        function(){
                            window.location.replace("turma_tela.php");
                    });
                }
            } 
        });
    });
}

function validaCampos() {
    var validado = true;
    if($("#nomeNovaTurma").val() == ""){
        $("#nomeNovaTurma-form").addClass("has-error");
        validado = false;
    }else{
        $("#nomeNovaTurma-form").removeClass("has-error");
    }

    return validado;
}