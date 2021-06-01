<?php require APPROOT . '/views/inc/header.php'; ?>

<head>
    <div id="navbar-placeholder"></div>
</head>
<body style="background-color: #444442 !important;">
<main>
    <form action="<?php echo URLROOT; ?>/users/register" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="col">
                <h1>Crie sua conta!</h1>
            </div>
            <div class="row input-container mx-auto">
                <div class="col-xs-12">
                    <div class="styled-input wide">
                        <input type="text" name="nameField" id="fullname" data-toggle="tooltip" title="Disabled tooltip" required />
                        <label>Nome completo <span id="propError" style="display: none">(Campo Invalido)</span> </label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="styled-input wide">
                        <input type="text" name="emailField" id="email" required />
                        <label>Email <?php echo $data['email_error'] ?><span id="emailError" style="display: none">(Campo Invalido)</span></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="styled-input wide">
                        <input type="password" name="passwordField" id="password" required />
                        <label>Passowrd<span id="passwordError" style="display: none">(Campo Invalido)</span></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="styled-input wide">
                        <input type="password" name="conPasswordField" id="confPassword" required />
                        <label>Password<span id="confPasswordError" style="display: none">(Campo Invalido)</span></label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="styled-input wide">
                        <input type="text" name="cityField" id="city" required />
                        <label>Cidade<span id="cityError" style="display: none">(Campo Invalido)</span></label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="styled-input wide">
                        <input type="text" name="addressField" id="address" required />
                        <label>Endereço<span id="addError" style="display: none">(Campo Invalido)</span></label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="styled-input wide">
                        <input type="text" name="addressNumberField" id="addressNumber" required />
                        <label>No<span id="addressNumberError" style="display: none">(Campo Invalido)</span></label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <button id="submit-btn" class="btn-lrg submit-btn">Enviar</button>
                </div>
            </div>
        </div>
    </form>
</main>
</body>
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

            //Verificação de caracteres especiais pelo método de Regex
            var an = /\d/i;
            var al = /\D/i;
            var specialChar = /[#%$^~!&*()_+\-=\[\]{}"\\|<>\/]/g;
            var emailtest = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            //Criando um array de booleanos, o formulario apenas sera enviado ao banco de dados se
            //todas as verificaçÿes forem falso
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