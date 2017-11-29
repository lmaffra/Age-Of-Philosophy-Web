$( document ).ready(function() {
    
    carregarEstatisticas();
    
});

var json = [];
function carregarEstatisticas() {
    $.get(
        '/TISIV/functions/estatisticas.php'
    ).success(function(resp){
        json = $.parseJSON(resp);
        $("#pergunta-errada").html("A pergunta com maior quantidade de erros é: ID " + json[0]["id"] + " - \"" + json[0]["enunciado"] + "\" com " + json[0]["erros"] + " erros.");
        $("#pergunta-certa").html("A pergunta com maior quantidade de acertos é: ID " + json[1]["id"] + " - \"" + json[1]["enunciado"] + "\" com " + json[1]["acertos"] + " erros.");
    });
}