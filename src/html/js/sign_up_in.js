var _ajax_call = false;

$(document).ready(function () {

    $("#signup_email").bind('keyup', function () {
        $("#div_error_email").hide("slide", {direction: "up"}, "fast");
        if (is_email($(this).val().trim())) {
            $("#sign_ajax_loader").show();
            vericarEmailUtilizado();
        } else
            $("#sign_ajax_loader").hide();
    });

    $("#signup_pass_two").bind('keyup', function () {
        if($(this).val() != ''){
            if ($(this).val() == $("#signup_pass").val()) {
                $("#div_error_pass").hide("slide", {direction: "up"}, "fast");
                $("#actionSignUp").removeAttr("disabled");
            } else{
                $("#actionSignUp").attr("disabled", true);
                $("#div_error_pass").show("slide", {direction: "up"}, "fast");
            }
        }
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
            if (!data.status){
                $("#div_error_email").show("slide", {direction: "up"}, "fast");
            }else{
                $("#signup_pass_two").keyup();
            }
        });
    _ajax_call = true;
}