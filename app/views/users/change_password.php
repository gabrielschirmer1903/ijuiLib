<?php require APPROOT . '/views/inc/header.php'; ?>

<body>
    <div class="container emp-profile">
        <form method="POST" action="<?php echo URLROOT; ?>/users/changePassword">
            <h1 class="mb-4">Alterar Senha</h1>
            <div class="form-outline mb-4">
                <input type="password" id="current_pwd" name="current_pwd" class="form-control" />
                <label class="form-label" for="form4Example1">Insira a senha atual:</label>
            </div>
            <div class="form-outline mb-4">
                <input type="password" id="new_pwd" name="new_pwd" class="form-control" />
                <label class="form-label" for="form4Example2">Nova senha:</label>
            </div>
            <div class="form-outline mb-4">
                <input type="password" class="form-control" id="conf_new_pwd" name="conf_new_pwd" />
                <label class="form-label" for="conf_new_pwd">Confirme a nova senha:</label>
            </div>
            <span id="error" style="display: none">(As duas senhas não são iguais)</span>
            <button type="submit" id="submit-btn" name="submit-btn" class="btn btn-primary btn-block mb-4">Alterar</button>
            <a href="<?php echo URLROOT; ?>/users/index/" class="btn btn-danger btn-block mb-4">Cancelar</a>
        </form>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>