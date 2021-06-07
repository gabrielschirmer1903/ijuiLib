<body>

  <?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="mt-3">
    <div class="container announce-book">
      <form method="POST" action="<?php echo URLROOT; ?>/users/editprofile">
        <div class="row mt-4">
          <div class="col-12 mx-auto">
            <h1 style="text-align: center;">Alterar Perfil</h1>
          </div>
        </div>

        <div class="form-outline mb-4">
          <input type="text" id="editNameField" name="editName" class="form-control" value="<?php echo $data['user']->name; ?>" />
          <label class="form-label" for="form4Example1">Nome</label>
        </div>

        <div class="form-outline mb-4">
          <input type="email" id="editEmailField" name="editEmail" class="form-control" value="<?php echo $data['user']->email; ?>" />
          <label class="form-label" for="form4Example2">Endereço de e-mail</label>
        </div>

        <div class="form-outline mb-4">
          <input type="text" class="form-control" id="editCityField" name="city" value="<?php echo $data['user']->city; ?>" />
          <label class="form-label" for="form4Example3">Cidade</label>
        </div>

        <div class="form-outline mb-4">
          <input type="email" class="form-control" id="editAddressField" name="address" value="<?php echo $data['user']->address; ?>" />
          <label class="form-label" for="form4Example3">Endereço</label>
        </div>

        <div class="form-outline mb-4">
          <input type="text" class="form-control" id="editNumberField" name="number" value="<?php echo $data['user']->address_number; ?>" />
          <label class="form-label" for="form4Example3">No endereço</label>
        </div>
        <div class="form-outline mb-4">
          <input type="text" class="form-control" id="editPhoneField" name="phone" value="<?php echo $data['user']->phone; ?>" />
          <label class="form-label" for="form4Example3">Telefone</label>
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4">Salvar Perfil</button>
      </form>
    </div>
  </div>

  <?php require APPROOT . '/views/inc/footer.php'; ?>