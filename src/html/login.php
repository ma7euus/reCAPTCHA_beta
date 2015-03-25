<?php
require_once APP_HTML_DIR . 'layouts/login_header.php';
?>

<body style="background-color: #efefef">
    
        <div class="container" style="background-color: #ded7f8; padding: 20px 20px 20px 20px; margin-top: 100px; width: 400px; border-radius: 10px; border: 2px solid #c3c0cc">
            <!--<h1>Acesse/Cadastre-se</h1>-->
            <div id="nav-bar" class="tabbable">
                <ul class="nav nav-pills">
                    <li class="active"><a href="#tab_sign_in" data-toggle="tab">Entre</a></li>
                    <li><a href="#tab_sign_up" data-toggle="tab">Cadastre-se</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_sign_in">

                        <?php
                        require_once APP_HTML_DIR . 'layouts/sign_in.php';
                        ?>
                    </div>
                    <div class="tab-pane" id="tab_sign_up">
                        <?php
                        require_once APP_HTML_DIR . 'layouts/sign_up.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>