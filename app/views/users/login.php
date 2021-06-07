<body>
    <?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="landing-body"> </div>
    <div class="login">
        <div class="container">
            <div class="row my-5">
                <div class="col-6 mx-auto">
                    <h2>Conecte-se!</h2>
                </div>
            </div>
            <form action="<?php echo URLROOT; ?>/users/login" method="POST" enctype="multipart/form-data">
                <div class="row my-5">
                    <div class="col-6 mx-auto">
                        <label><span id="emailError" style="display: none">(Campo Invalido)</span></label>
                        <input class="login-input" type="email" name="emailField" id="email" required placeholder="E-mail">
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-6 mx-auto">
                        <label><span id="passwordError" style="display: none">(Campo Invalido)</span></label>
                        <input class="login-input" type="password" name="passwordField" id="password" required placeholder="Password">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-4 offset-6">
                        <a style="color: white;" href="<?php echo URLROOT; ?>/users/register">Não possue uma conta? Registre-se!</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mx-auto">
                        <button id="submit-btn" class="btn btn-outline-secondary btn-lg px-4">Conectar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        //Adicionando a navbar na pagina atraves de JS
        $.get("layout/header.html", function(data) {
            $("#navbar-placeholder").replaceWith(data);
        });

        $(document).ready(function() {


            $("#submit-btn").on('click', function() {
                let arr = []
                let email = $('#email').val();
                let password = $('#password').val();
                let confPassword = $('#confPassword').val();

                //Verifica??o de caracteres especiais pelo m?todo de Regex
                var an = /\d/i;
                var al = /\D/i;
                var specialChar = /[#%$^~!&*()_+\-=\[\]{}"\\|<>\/]/g;
                var emailtest = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                //Criando um array de booleanos, o formulario apenas sera enviado ao banco de dados se
                //todas as verifica??es forem falso
                arr.push(email.length == 0 ? true : false)
                arr.push(email.test(emailtest) ? false : true)
                arr.push(password == 0 ? true : false)

                console.log(arr)

                if (arr[0] || arr[1]) {
                    $('#propError').css("display", "inline")
                }
                if (arr[2]) {
                    $('#emailError').css("display", "inline")
                }
                return arr.includes(true) ? false : true
            })
        });
    </script>
    <?php require APPROOT . '/views/inc/footer.php'; ?>