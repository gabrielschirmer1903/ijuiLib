<body>
    <?php require APPROOT . '/views/inc/header.php'; ?>

    <main>
        <div class="landing-body"> </div>
        <div class="login">
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
                            <input class="login-input" type="text" name="nameField" id="fullname" data-toggle="tooltip" title="Disabled tooltip" placeholder="Nome Completo" required />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <label><?php echo $data['email_error'] ?><span id="emailError" style="display: none">(Campo Invalido)</span></label>
                            <input class="login-input" type="text" name="emailField" id="email" placeholder="E-mail" required />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <label><span id="passwordError" style="display: none">(Campo Invalido)</span></label>
                            <input class="login-input" type="password" name="passwordField" id="password" placeholder="Password" required />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <label><span id="confPasswordError" style="display: none">(Campo Invalido)</span></label>
                            <input class="login-input" type="password" name="conPasswordField" id="confPassword" placeholder="Confirm password" required />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <label><span id="cityError" style="display: none">(Campo Invalido)</span></label>
                            <input class="login-input" type="text" name="cityField" id="city" placeholder="Cidade" required />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-8">
                            <label><span id="addError" style="display: none">(Campo Invalido)</span></label>
                            <input class="login-input" type="text" name="addressField" id="address" placeholder="Endereço eg. Avenida Porto Alegre" required />
                        </div>
                        <div class="col-4">
                            <label><span id="addressNumberError" style="display: none">(Campo Invalido)</span></label>
                            <input class="login-input" type="text" name="addressNumberField" id="addressNumber" placeholder="Número do endereço" required />
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-12">
                            <button id="submit-btn" class="btn btn-outline-secondary btn-lg px-4">Registrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <script type="text/javascript">
            //Adicionando a navbar na pagina atraves de JS
            $.get("layout/header.html", function(data) {
                $("#navbar-placeholder").replaceWith(data);
            });

            $(document).ready(function() {


                $("#submit-btn").on('click', function() {
                    let arr = []
                    let fullname = $('#fullname').val();
                    let email = $('#email').val();
                    let password = $('#password').val();
                    let confPassword = $('#confPassword').val();
                    let address = $('#address').val();
                    let addressNumber = $('#addressNumber').val();
                    let city = $('#city').val();

                    //Verifica��o de caracteres especiais pelo m�todo de Regex
                    var an = /\d/i;
                    var al = /\D/i;
                    var specialChar = /[#%$^~!&*()_+\-=\[\]{}"\\|<>\/]/g;
                    var emailtest = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    //Criando um array de booleanos, o formulario apenas sera enviado ao banco de dados se
                    //todas as verifica��es forem falso
                    arr.push(fullname.length == 0 || (fullname).match(an) ? true : false)
                    arr.push((fullname).match(specialChar) ? true : false)
                    arr.push(email.length == 0 ? true : false)
                    arr.push(email.test(emailtest) ? false : true)
                    arr.push(password == 0 ? true : false)
                    arr.push(password.match(confPassword) ? false : true)
                    arr.push(address.match(specialChar) ? true : false)
                    arr.push(city.match(specialChar) ? true : false)
                    arr.push(addressNumber.match(an) || addressNumber.match(al) || addressNumber.match(specialchar) ? true : false)

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
                        $('#cityError').css("display", "inline")
                    }
                    if (arr[7]) {
                        $('#addError').css("display", "inline")
                    }
                    if (arr[8]) {
                        $('#addressNumberError').css("display", "inline")
                    }
                    return arr.includes(true) ? false : true
                })
            });
        </script>
        <?php require APPROOT . '/views/inc/footer.php'; ?>