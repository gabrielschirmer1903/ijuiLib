<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container emp-profile">
    <form method="POST" action="<?php echo URLROOT; ?>/users/changePassword">
        <!-- Name input -->
        <div class="form-outline mb-4">
            <input type="password" id="current_pwd" name="current_pwd" class="form-control"/>
            <label class="form-label" for="form4Example1">Insira a senha atual:</label>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="password" id="new_pwd" name="new_pwd" class="form-control" />
            <label class="form-label" for="form4Example2">Nova senha:</label>
        </div>

        <!-- Message input -->
        <div class="form-outline mb-4">
            <input type="password" class="form-control" id="conf_new_pwd" name="conf_new_pwd"/>
            <label class="form-label" for="conf_new_pwd">Confirme a nova senha:</label>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>