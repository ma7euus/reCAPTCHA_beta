<?php
require_once APP_HTML_DIR . 'layouts/login_header.php';
?>

<body>

    <div class="container">
        <h1>Acesse/Cadastre-se</h1>
        <div id="nav-bar" class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_sign_in" data-toggle="tab">Entre</a></li>
                <li><a href="#tab_sign_up" data-toggle="tab">Inscreva-se</a></li>
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