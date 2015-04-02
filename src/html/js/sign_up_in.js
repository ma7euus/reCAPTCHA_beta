var _ajax_call = false;

$(document).ready(function () {
    $("#actionSignUp").attr("disabled", true);

    $("#signup_email").bind('keyup', function () {
        $("#div_error_email").hide("slide", {direction: "up"}, "fast");
        if (is_email($(this).val().trim())) {
            $("#sign_ajax_loader").show();
            vericarEmailUtilizado();
        } else
            $("#sign_ajax_loader").hide();
    });

    $("#signup_pass_two").bind('keyup', function () {
        if ($(this).val() != '') {
            if ($(this).val() == $("#signup_pass").val()) {
                $("#div_error_pass").hide("slide", {direction: "up"}, "fast");
                $("#actionSignUp").removeAttr("disabled");
            } else {
                $("#actionSignUp").attr("disabled", true);
                $("#div_error_pass").show("slide", {direction: "up"}, "fast");
            }
        }
    });

    $("#actionSignIn").bind("click", function () {
        $("#div_error_auth").hide("slide", {direction: "up"}, "fast");
        $("#sign_ajax_loader").show();
        signIn();
    });

    $("#actionSignUp").bind("click", function () {
        if (!$(this).attr("disabled"))
            signUp();
    });

});

function signIn() {
    var dados = {};

    dados.email = $("#signin_email").val();
    dados.pass = $("#signin_pass").val();

    $.post("api/signin", JSON.stringify(dados)).always(function () {
        //alert("ALWAYS");
    }).done(function (result) {
        $("#sign_ajax_loader").hide();
        if (result.auth)
            $(location).attr('href', 'index.php');
        else
            $("#div_error_auth").show("slide", {direction: "up"}, "fast");
    });
}

function signUp() {

    var dados = {};

    dados.email = $("#signup_email").val();
    dados.pass = $("#signup_pass").val();

    $.post("api/signup", JSON.stringify(dados)).always(function () {
        //alert("ALWAYS");
    }).done(function (result) {
        if(result.auth)
            $(location).attr('href', 'index.php');
    });
}

function vericarEmailUtilizado() {
    var email = $("#signup_email").val();

    if (!_ajax_call)
        $.get("api/email_exist/" + email, function (data) {
            $("#sign_ajax_loader").hide();
            _ajax_call = false;
            if (!data.status) {
                $("#actionSignUp").attr("disabled", true);
                $("#div_error_email").show("slide", {direction: "up"}, "fast");
            }
            $("#signup_pass_two").keyup();
        });
    _ajax_call = true;
}