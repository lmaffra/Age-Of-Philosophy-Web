$( document ).ready(function() {
    carregarTurmas();
    
    $('#turmas-select').change(function () {
        carregarRank();
    }).change();
    
    $('#tipo-select').change(function () {
        carregarRank();
    }).change();
    
});

var json = [];

function carregarRank(){
    if($('#tipo-select').val() == 0){
        carregarRankTempo();
        carregarMediaTempoTurma();
        $('#tipo-titulo').html("Tempo");
    }else{
        carregarRankPonto();
        carregarMediaPontoTurma();
        $('#tipo-titulo').html("Pontos");
    }
}

function carregarRankTempo() {
    $("#rank_tempo_table > tbody").html("");
    $.get(
        '/TISIV/functions/rank_tempo.php?idturma=' + $('#turmas-select').val()
    ).success(function(resp){
        json = $.parseJSON(resp);
        
        $(json).map(function(i) {
            var myRow = "<tr><td>" + json[i]['nome'] + "</td><td>" + json[i]['turma']
            + "</td><td>" + json[i]['ano'] + "</td><td>" + formatarData(json[i]['dt_jogada']) + "</td><td>" + json[i]['tempo'].split(".")[0] + "</td>";
            $('#rank_tempo_table').append(myRow);
        });
    });
}

function carregarRankPonto() {
    $("#rank_tempo_table > tbody").html("");
    $.get(
        '/TISIV/functions/rank_ponto.php?idturma=' + $('#turmas-select').val()
    ).success(function(resp){
        json = $.parseJSON(resp);
        
        $(json).map(function(i) {
            var myRow = "<tr><td>" + json[i]['nome'] + "</td><td>" + json[i]['turma']
            + "</td><td>" + json[i]['ano'] + "</td><td>" + formatarData(json[i]['dt_jogada']) + "</td><td>" + json[i]['pont_quiz'] + "</td>";
            $('#rank_tempo_table').append(myRow);
        });
    });
}

function carregarMediaTempoTurma(){
    $.get(
        '/TISIV/functions/rank_tempo_media.php?idturma=' + $('#turmas-select').val()
    ).success(function(resp){
        if(resp != "null"){
            $("#media-turma").html("Media Turma: " + resp.split("\"")[1].split(".")[0]);
        }else{
            $("#media-turma").html("");
        }
    });
}

function carregarMediaPontoTurma(){
    $.get(
        '/TISIV/functions/rank_ponto_media.php?idturma=' + $('#turmas-select').val()
    ).success(function(resp){
        if(resp != "null"){
            $("#media-turma").html("Media Turma: " + resp.split("\"")[1]);
        }else{
            $("#media-turma").html("");
        }
    });
}

function carregarTurmas(){
    $.get(
        '/TISIV/functions/turma.php'   
    ).success(function(resp){
        json = $.parseJSON(resp);
        $(json).map(function(i) {
            $('#turmas-select').append($('<option>', {
                value: json[i]["id"],
                text: json[i]["turma"]
            }));
        })
    });
}

function formatarData(data){
    aux = data.split("-");
    return aux[2] + "/" + aux[1] + "/" + aux[0];
}


