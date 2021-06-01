<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container emp-profile">
    <form method="POST" action="<?php echo URLROOT; ?>/users/changepassword">
        <!-- Name input -->
        <div class="form-outline mb-4">
            <input type="text" id="editNameField" name="editName" class="form-control" placeholder="<?php echo $data['user']->name; ?>" />
            <label class="form-label" for="form4Example1">Insira a senha atual:</label>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="editEmailField" name="editEmail" class="form-control" placeholder="<?php echo $data['user']->email; ?>" />
            <label class="form-label" for="form4Example2">Nova senha:</label>
        </div>

        <!-- Message input -->
        <div class="form-outline mb-4">
            <input class="form-control" id="editCityField" name="city" placeholder="<?php echo $data['user']->city; ?>" />
            <label class="form-label" for="form4Example3">Confirme a nova senha:</label>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>