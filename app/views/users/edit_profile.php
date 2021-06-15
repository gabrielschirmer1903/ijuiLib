<body>

  <?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="mt-3">
    <div class="container announce-book">
      <form method="POST" action="<?php echo URLROOT; ?>/users/editprofile">
        <div class="row mt-4">
          <div class="col-12 mx-auto">
            <h1 class="mb-4">Alterar Perfil</h1>
          </div>
        </div>

        <div class="form-outline mb-4">
          <input type="text" id="editNameField" name="editName" class="form-control" value="<?php echo $data['user']->name; ?>" />
          <label class="form-label" for="form4Example1">Nome <span id="nameError" style="display: none">(Campo Invalido)</span></label>
        </div>

        <div class="form-outline mb-4">
          <input type="email" id="editEmailField" name="editEmail" class="form-control" value="<?php echo $data['user']->email; ?>" />
          <label class="form-label" for="form4Example2">Endereço de e-mail <span id="emailError" style="display: none">(Campo Invalido)</span></label>
        </div>

        <div class="form-outline mb-4">
          <input type="text" class="form-control" id="editCityField" name="city" value="<?php echo $data['user']->city; ?>" />
          <label class="form-label" for="form4Example3">Cidade <span id="cityError" style="display: none">(Campo Invalido)</span></label>
        </div>

        <div class="form-outline mb-4">
          <input type="text" class="form-control" id="editAddressField" name="address" value="<?php echo $data['user']->address; ?>" />
          <label class="form-label" for="form4Example3">Endereço <span id="addressError" style="display: none">(Campo Invalido)</span></label>
        </div>

        <div class="form-outline mb-4">
          <input type="text" class="form-control" id="editNumberField" name="number" value="<?php echo $data['user']->address_number; ?>" />
          <label class="form-label" for="form4Example3">N° endereço <span id="numberError" style="display: none">(Campo Invalido)</span></label>
        </div>
        <div class="form-outline mb-4">
          <input type="text" class="form-control" id="editPhoneField" name="phone" value="<?php echo $data['user']->phone; ?>" />
          <label class="form-label" for="form4Example3">Telefone <span id="phoneError" style="display: none">(Campo Invalido)</span></label>
        </div>

        <button type="submit" id="submit-btn" class="btn btn-primary btn-block mb-4">Salvar Perfil</button>
        <a href="<?php echo URLROOT; ?>/users/index/" class="btn btn-danger btn-block mb-4">Cancelar</a>
      </form>
    </div>
  </div>

  <script src="//code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#submit-btn").on('click', function() {
                let arr = []
                let name = $('#editNameField').val();
                let email = $('#editEmailField').val();
                let city = $('#editCityField').val();
                let address = $('#editAddressField').val();
                let number = $('#editNumberField').val();
                let phone = $('#editPhoneField').val();

                //Verifica??o de caracteres especiais pelo m?todo de Regex
                var an = /\d/;
                var al = /\D/i;
                var specialChar = /[#%$^~!&*()_+\-=\[\]{}"\\|<>\/]/g;
                var specialChar2 = /[#%$^~@!&*()_+\-=\[\]{}"\\|<>\/]/g;
                var emailtest = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

                //Criando um array de booleanos, o formulario apenas sera enviado ao banco de dados se
                //todas as verifica??es forem falso
                arr.push(name.length == 0 || an.test(name) || specialChar2.test(name)  ? true : false)
                arr.push(email.length == 0 ? true : false)
                arr.push(emailtest.test(email) ? false : true)
                arr.push(city == 0 ? true : false)
                arr.push(city.match(an) || address.match(specialChar) ? true : false)
                arr.push(address == 0  ? true : false)
                arr.push(address.match(an) || address.match(specialChar) ? true : false)
                arr.push(number == 0  ? true : false)
                arr.push(number.match(al) || address.match(specialChar) ? true : false)
                arr.push(phone == 0 || al.test(phone) ? true : false)
                arr.push(number.match(al) || address.match(specialChar) ? true : false)

                console.log(arr)

                if (arr[0]) {
                    $('#nameError').css("display", "inline")
                }
                if (arr[1] || arr[2]) {
                    $('#emailError').css("display", "inline")
                }
                if (arr[3] || arr[4]) {
                    $('#cityError').css("display", "inline")
                }
                if (arr[5] || arr[6]) {
                    $('#addressError').css("display", "inline")
                }
                if (arr[7] || arr[8]) {
                    $('#numberError').css("display", "inline")
                }
                if (arr[9] || arr[10]) {
                    $('#phoneError').css("display", "inline")
                }
                return arr.includes(true) ? false : true
            })
        });
    </script>

  <?php require APPROOT . '/views/inc/footer.php'; ?>