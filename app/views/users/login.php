<?php require APPROOT . '/views/inc/header.php'; ?>

<head>
    <div id="navbar-placeholder"></div>
</head>
<body style="background-color: #444442 !important;">
<main>
    <form action="<?php echo URLROOT; ?>/users/login" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="col">
                <h1>Conecte-se!</h1>
            </div>
            <div class="row input-container mx-auto">
                <div class="col-xs-12">
                    <div class="styled-input wide">
                        <input type="text" name="emailField" id="email" required />
                        <label>Email<span id="emailError" style="display: none">(Campo Invalido)</span></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="styled-input wide">
                        <input type="text" name="passwordField" id="password" required />
                        <label>Passowrd<span id="passwordError" style="display: none">(Campo Invalido)</span></label>
                    </div>
                </div>
                <div class="col">
                    <a href="<?php echo URLROOT; ?>/users/register">Não possue uma conta? Registre-se</a>
                </div>
                <div class="col-xs-12">
                    <button id="submit-btn" class="btn-lrg submit-btn">Conectar</button>
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