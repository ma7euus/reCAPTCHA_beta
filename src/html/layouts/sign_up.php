<!--<form class="form-signup">-->
    <!--<h2 class="form-signin-heading">Acesse</h2>-->
    <label for="inputEmail" style="margin-left: 3px; margin-top: 40px; color: #9894a8" class="">Email:</label>
    <input type="email" id="signup_email" class="form-control" style="margin-bottom: 5px;" placeholder="Informe um email" required autofocus>
    <div class="form-control" id="div_error_email" style="display: none; background-color: crimson; height: 35px; text-align: center; color: #efefef;">
        <span>Esse email já está em uso!</span>
    </div>
    <label for="inputPassword" class="" style="margin-left: 3px; color: #9894a8">Senha:</label>
    <input type="password" id="signup_pass"  style="margin-bottom: 5px;" class="form-control" placeholder="Informe uma senha" required>
    <label for="inputPassword" class="" style="margin-left: 3px; color: #9894a8">Confirme:</label>
    <input type="password" id="signup_pass_two"  style="margin-bottom: 0px;" class="form-control" placeholder="Confirme a senha" required>
    <div class="form-control" id="div_error_pass" style="display: none; margin-top: 5px; background-color: crimson; height: 35px; text-align: center; color: #efefef;">
        <span>As senhas não conferem!</span>
    </div>
    <button class="btn btn-lg btn-primary btn-block" disabled="disabled" id="actionSignUp" style="margin-top: 20px; cursor: pointer" type="button">Cadastre-se</button>
<!--</form>-->
