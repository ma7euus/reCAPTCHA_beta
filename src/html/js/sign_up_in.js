var _ajax_call = false;

$(document).ready(function () {

    $("#signup_email").bind('keypress', function () {
        $("#div_error_email").hide("slide", {direction: "up"}, "fast");
        if (is_email($(this).val().trim())) {
            $("#sign_ajax_loader").show();
            vericarEmailUtilizado();
        } else
            $("#sign_ajax_loader").hide();
    });

    $("#actionSignIn").bind("click", function () {
        signIn();
    });

    $("#actionSignUp").bind("click", function () {
        if ($(this).attr("disabled"))
            signUp();
    });

});

function signIn() {

}

function signUp() {

    var email = $("#signup_email").val();
    
    
    
}

function vericarEmailUtilizado() {
    var email = $("#signup_email").val();

    if (!_ajax_call)
        $.get("api/email_exist/" + email, function (data) {
            $("#sign_ajax_loader").hide();
            _ajax_call = false;
            if (!data.status)
                $("#div_error_email").show("slide", {direction: "up"}, "fast");
        });
    _ajax_call = true;
}