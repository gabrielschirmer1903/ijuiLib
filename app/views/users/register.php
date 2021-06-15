<?php require APPROOT . '/views/inc/header.php'; ?>
<body>
    <main>
        <div class="landing-body2"></div>
        <div class="mt-5 login">
            <form action="<?php echo URLROOT; ?>/users/register" method="POST" enctype="multipart/form-data">
                <div class="container">
                    <div class="row mx-auto py-3">
                        <div class="col">
                            <h1>Crie sua conta!</h1>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <label><span id="propError" style="display: none">(Campo Invalido)</span> </label>
                            <input class="login-input" type="text" name="nameField" id="nameField" data-toggle="tooltip" title="Disabled tooltip" placeholder="Nome Completo" required />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <label><?php echo $data['email_error'] ?><span id="emailError" style="display: none">(Campo Invalido)</span></label>
                            <input class="login-input" type="text" name="emailField" id="emailField" placeholder="E-mail" required />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <label><span id="passwordError" style="display: none">(Campo Invalido)</span></label>
                            <input class="login-input" type="password" name="passwordField" id="passwordField" placeholder="Password" required />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <label><span id="confPasswordError" style="display: none">(Campo Invalido)</span></label>
                            <input class="login-input" type="password" name="conPasswordField" id="conPasswordField" placeholder="Confirm password" required />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <label><span id="phoneNumberError" style="display: none">(Campo Invalido)</span></label>
                            <input class="login-input" type="text" name="phoneNumber" id="phoneNumber" placeholder="Telefone" required />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <label><span id="cityError" style="display: none">(Campo Invalido)</span></label>
                            <input class="login-input" type="text" name="cityField" id="cityField" placeholder="Cidade" required />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-8">
                            <label><span id="addError" style="display: none">(Campo Invalido)</span></label>
                            <input class="login-input" type="text" name="addressField" id="addressField" placeholder="Endereço eg. Avenida Porto Alegre" required />
                        </div>
                        <div class="col-4">
                            <label><span id="addressNumberError" style="display: none">(Campo Invalido)</span></label>
                            <input class="login-input" type="text" name="addressNumberField" id="addressNumber" placeholder="Número do endereço" required />
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-6">
                            <button id="submit-btn" name="submit-btn" class="btn btn-outline-secondary btn-lg px-4">Registrar</button>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-outline-secondary btn-lg px-4" href="<?php echo URLROOT; ?>/index">Voltar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script src="//code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            console.log('asd')
            $("#submit-btn").on('click', function() {
                let arr = []
                let fullname = $('#nameField').val();
                let email = $('#emailField').val();
                let password = $('#passwordField').val();
                let confPassword = $('#conPasswordField').val();
                let address = $('#addressField').val();
                let addressNumber = $('#addressNumber').val();
                let city = $('#cityField').val();
                let phoneNumber = $('#phoneNumber').val();

                //Verifica��o de caracteres especiais pelo m�todo de Regex
                var an = /\d/i;
                var al = /\D/i;
                var specialChar = /[#%$^~!&*()_+\-=\[\]{}"\\|<>\/]/g;
                var emailtest = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

                //Criando um array de booleanos, o formulario apenas sera enviado ao banco de dados se
                //todas as verifica��es forem falso
                arr.push(fullname.length == 0 || an.test(fullname) ? true : false)
                arr.push((specialChar).test(fullname) ? true : false)
                arr.push(email.length == 0 ? true : false)
                arr.push(emailtest.test(email) ? false : true)
                arr.push(password == 0 ? true : false)
                arr.push(password.match(confPassword) ? false : true)
                arr.push(specialChar.match(address) || an.match(address) ? true : false)
                arr.push(specialChar.match(city) ? true : false)
                arr.push(an.test(city) ? true : false)
                arr.push(al.match(addressNumber) || specialChar.match(addressNumber) ? true : false)
                arr.push((phoneNumber.length == 0 || al.test(phoneNumber)) ? true : false)
                arr.push(specialChar.test(phoneNumber) ? true : false)


                console.log(arr)

                if (arr[0] || arr[1]) {
                    $('#propError').css("display", "inline")
                }
                if (arr[2] || arr[3]) {
                    $('#emailError').css("display", "inline")
                }
                if (arr[4]) {
                    $('#passwordError').css("display", "inline")
                }
                if (arr[5]) {
                    $('#confPasswordError').css("display", "inline")
                }
                if (arr[6]) {
                    $('#addError').css("display", "inline")
                }
                if (arr[7] || arr[8]) {
                    $('#cityError').css("display", "inline")
                }
                if (arr[9]) {
                    $('#addressNumberError').css("display", "inline")
                }
                if (arr[10] || arr[11]) {
                    $('#phoneNumberError').css("display", "inline")
                }
                return arr.includes(true) ? false : true
            });

        });
    </script>
    <?php require APPROOT . '/views/inc/footer.php'; ?>