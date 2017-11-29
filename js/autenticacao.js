var usrMail = "erro";

$( document ).ready(function() {
    

    $("#logout-bt").click(function(){
        $.ajax({
               type: "POST",
               url: '/TISIV/valida.php',
               data:{action:'logout'},
               success:function(resp) {
                   window.location.replace("/TISIV/login.php");
               }

          });
     });

    $.get(
        '/TISIV/valida.php'
    ).success(function(resp){

        result = $.parseJSON(resp);

        DisplayName = result['nome_exibicao'];
        UserType = "Administrador";

        $("#user-name").html(DisplayName);

        if(DisplayName == "") {
            window.location.replace("login.php");
        }
        
        $('.nav-tabs li.disabled > a[data-toggle=tab]').on('click', function(e) {
            e.stopImmediatePropagation();
        });
        
    }).fail(function() {
        $("#user-name").html("erro")
    });

    $('.nav-tabs li.disabled > a[data-toggle=tab]').on('click', function(e) {
        e.stopImmediatePropagation();
    });
    
});

function loadOut(){
    $.ajax({
        type: "POST",
        url: 'valida.php',
        data:{action:'timeout'},
        success:function(resp){
            if (resp == 1) {
                window.location.replace("login.php");
            }
        }

    });
}