var usrMail = "erro";

$( document ).ready(function() {
    

    $("#logout-bt").click(function(){
        $.ajax({
               type: "POST",
               url: 'valida.php',
               data:{action:'logout'},
               success:function(resp) {
                   window.location.replace("login.php");
               }

          });
     });

    $.get(
        'valida.php'
    ).success(function(resp){

        result = $.parseJSON(resp);

        DisplayName = result['displayname'];
        UserType = result['user_type'];
        Email = result['email'];
        permissions = result['user_type'];

        $("#user-name").html(DisplayName);

        if(usrDisplayName == "") {
            window.location.replace("login.php");
        }
        
        $(permissions).map(function(i) {
            document.getElementById(permissions[i]).style.display = "block";
        });
        
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