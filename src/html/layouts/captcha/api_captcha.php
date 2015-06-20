<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            var key_captcha = null;
            $(document).ready(function () {

                $("#captcha_").bind('keypress', function (event){
                    if(event.keyCode == 13){
                        $("#btn_test").click();
                    }
                });

                $("#update_captcha").click(function () {
                    $.get("http://localhost/reCAPTCHA_beta/src/api/get_catpcha", function (data) {
                        key_captcha = data.CAPTCHA_KEY;
                        $.each(data.CAPTCHAS, function (index, value) {
                            $("img#img_" + value.imgOrder).attr("src", "data:image/jpg;base64," + value.imgBase64);
                            $("img#img_" + value.imgOrder).css({
                                "position": "relative",
                                "margin": "10px",
                                "max-width": "200px",
                            });
                        });
                    });
                });

                $("#btn_test").click(function () {
                    $("#sign_ajax_loader").show();
                    $("#div_error_captcha").hide("slide", {direction: "up"}, "fast");
                    
                    var dados = {};
                    dados.keyCAPTCHA = key_captcha;
                    dados.textValidate = $("#captcha_").val();
                    $.post("http://localhost/reCAPTCHA_beta/src/api/validate_catpcha", JSON.stringify(dados)).always(function () {
                        //alert("ALWAYS");
                    }).done(function (result) {
                        $("#sign_ajax_loader").hide();
                        if (result.status){
                            var num = parseInt($("#numTentativas").html());
                            num++;
                            $("#numTentativas").html(num);
                            if(result._recog){
                                $("#update_captcha").click();
                            }
                        }else{
                            $("#div_error_captcha").show("slide", {direction: "up"}, "fast");
                            $("#mgs_error_captcha").html(result.msg);
                            //$("#captcha_").val("");
                            //$("#update_captcha").click();
                        }
                            //$(location).attr('href', 'index.php');
                        //else
                          //  $("#div_error_auth").show("slide", {direction: "up"}, "fast");
                    });
                });

                $("#update_captcha").click();
            });

        </script>

    </head>
    <body style="display: inline-block">

        <div style="width: auto; min-width: 355px; height: auto; background-color: #007f88; border-radius: 5px; padding: 7px">
            <div style="position: relative; width: auto; height: auto; background-color: #fff; border-radius: 3px;">
                <img id="img_0" />
                <img id="img_1" />
            </div>
            <div style="margin: 10px 0px; position: relative; padding: 3px; width: 250px; height: 53px; background-color: #337ab7; border-radius: 3px; color: #fff">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" style="color: #222" id="captcha_" placeholder="Digite as palavras acima...">
                </div>
            </div>
            <span class="btn btn-primary btn-lg" id="update_captcha" style="position:absolute; margin: -55px 0px 0px 260px;">
                <i class="glyphicon glyphicon-refresh"></i>
            </span>
            <div class="form-control" id="div_error_captcha" style="display: none; background-color: crimson; height: 35px; text-align: center; color: #efefef;">
                <span id="mgs_error_captcha" style="font-weight: bold;"></span>
            </div>
        </div>

        <div style="position: relative;">
            <button class="btn btn-lg btn-primary" id="btn_test" style="margin: 20px 20px 20px 100px; cursor: pointer" type="button">TESTAR</button>
            <div style="float: right; display: none;" id="sign_ajax_loader"><img src="<?=HTTP_HTML_DIR?>img/ajax_loader.gif"></div>
        </div>
        </br>
        <div style="display: inline; position: relative; margin-left: 50px; font-size: large;">
            <span style="display: inline-block">Tentativas: <span style="font-weight: bold" id="numTentativas">0</span></span>
        </div>
    </body>
</html>
