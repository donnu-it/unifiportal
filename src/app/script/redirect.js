$(document).ready(function(){
    $("#fon").css("display", "block");
    setTimeout(function(){
        var urlRedirect = $("#urlRedirect").val();
        window.location.replace(urlRedirect);
    }, 6000);
});