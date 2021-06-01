<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container emp-profile">
<form method="POST" action="<?php echo URLROOT; ?>/users/editprofile">
  <!-- Name input -->
  <div class="form-outline mb-4">
    <input type="text" id="editNameField" name="editName" class="form-control" placeholder="<?php echo $data['user']->name;?>"/>
    <label class="form-label" for="form4Example1">Name</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="editEmailField" name="editEmail" class="form-control" placeholder="<?php echo $data['user']->email;?>"/>
    <label class="form-label" for="form4Example2">Email address</label>
  </div>

  <!-- Message input -->
  <div class="form-outline mb-4">
    <input class="form-control" id="editCityField" name="city" placeholder="<?php echo $data['user']->city;?>"/>
    <label class="form-label" for="form4Example3">Cidade</label>
  </div>

  <div class="form-outline mb-4">
    <input class="form-control" id="editAddressField" name="address" placeholder="<?php echo $data['user']->address;?>"/>
    <label class="form-label" for="form4Example3">Endereço</label>
  </div>

  <div class="form-outline mb-4">
    <input class="form-control" id="editNumberField" name="number" placeholder="<?php echo $data['user']->address_number;?>"/>
    <label class="form-label" for="form4Example3">No endereço</label>
  </div>
  <div class="form-outline mb-4">
    <input class="form-control" id="editPhoneField" name="phone" placeholder="<?php echo $data['user']->phone;?>"/>
    <label class="form-label" for="form4Example3">Telefone</label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
</form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>