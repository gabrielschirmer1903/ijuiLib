<body>
    <?php require APPROOT . '/views/inc/header.php'; ?>

    <main>
        <br>
        <br>
        <form action="<?php echo URLROOT; ?>/books/add" method="POST" enctype="multipart/form-data">
            <div class="container announce-book">
                <div class="row my-5 ">
                    <div class="col-4 offset-4">
                        <h1 style="text-align: center;">Anuncie seu Livro!</h1>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-xs-12">
                        <div class="styled-input wide">
                            <label><span id="bnError" style="display: none">(Campo Invalido)</span></label>
                            <input class="ann-input" type="text" name="bookName" id="bookname" placeholder="Nome do Livro" required />
                        </div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-6">
                        <div style="float:right;">
                            <select class="form-control form-control-lg" id="bookCondition" name="bookCondition">
                                <optgroup label="Condição">
                                    <option value="0">Condição</option>
                                    <option value="Semi-novo">Semi-novo</option>
                                    <option value="Boa">Boa</option>
                                    <option value="Velho">Velho</option>
                                    <option value="Péssima">Péssima</option>
                                </optgroup>
                            </select>
                            <span id="condiError" style="display: none">(Selecione uma opção)</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div style="float:left;">
                            <select class="form-control form-control-lg" id="trade" name="trade">
                                <optgroup label="Troca">
                                    <option value="Troca" select>Tipo de Troca</option>
                                    <option value="Permanente">Permanente</option>
                                    <option value="Boa">Temporária</option>
                                </optgroup>
                            </select>
                            <span id="tradeError" style="display: none">(Selecione uma Opção)</span>
                        </div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-12">
                        <div class="styled-input wide">
                            <span id="sinError" style="display: none">(Preencha)</span>
                            <textarea class="form-control" name="synopsis" id="synopsis" placeholder="De uma sinopse da história" required></textarea>
                            <label></label>
                        </div>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-6">
                        <div>
                            <span>Envie uma foto de seu livro</span><span id="imgError" style="display: none">(Porfavor, insira uma imagem váldia)</span>
                            <label style="color: white;">Envie uma foto de seu livro </label>
                            <input class="form-control" type="file" id="bookImage" name="bookImage" placeholder="Envia uma foto do seu livro">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col offset-3">
                        <button id="submit-btn" class="btn btn-lg btn-primary">Enviar</button>
                    </div>
                    <div class="col">
                        <a href="<?php redirect('index'); ?>" type="button" class="btn btn-lg btn-danger">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script src="//code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript">
        //Adicionando a navbar na pagina atraves de JS
        $.get("layout/header.html", function(data) {
            $("#navbar-placeholder").replaceWith(data);
        });

        $(document).ready(function() {
            $("#submit-btn").on('click', function() {
                let arr = []
                // let fullname = $('#fullname').val();
                let bookname = $('#bookname').val();
                let synopsis = $('#synopsis').val();
                let condition = $('#bookCondition option:selected').val();
                let trade = $('#trade option:selected').val();
                let image = $('#bookImage').val();
                let imageSplit = image.split('.').pop();

                //Verifica��o de caracteres especiais pelo m�todo de Regex
                var an = /\d/i;
                var al = /\D/i;
                var specialChar = /[#%$^~!&*()_+\-=\[\]{}"\\|<>\/]/g;

                //Criando um array de booleanos, o formulario apenas sera enviado ao banco de dados se
                //todas as verifica��es forem falso
                // arr.push(fullname.length == 0 || (fullname).match(an) ? true : false)
                // arr.push((fullname).match(specialChar) ? true : false)
                arr.push(bookname.length == 0 ? true : false)
                arr.push(condition == 0 || condition == "0" ? true : false)
                arr.push(trade == 0 || trade == "0" ? true : false)
                arr.push(synopsis == "" ? true : false)

                if ((imageSplit.toLowerCase() == 'jpg') || (imageSplit.toLowerCase() == 'png') || (imageSplit.toLowerCase() == 'jpeg')) {
                    arr.push(false);
                } else {
                    arr.push(true);
                }

                console.log(arr)

                if (arr[0]) {
                    $('#bnError').css("display", "inline")
                }
                if (arr[2]) {
                    $('#tradeError').css("display", "inline")
                }
                if (arr[1]) {
                    $('#condiError').css("display", "inline")
                }
                if (arr[3]) {
                    $('#sinError').css("display", "inline")
                }
                if (arr[4]) {
                    $('#imgError').css("display", "inline")
                }
                return arr.includes(true) ? false : true
            })
        });
    </script>

    <?php require APPROOT . '/views/inc/footer.php'; ?>