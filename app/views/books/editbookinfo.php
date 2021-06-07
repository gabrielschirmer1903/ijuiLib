<body>

    <?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="mt-3">
        <div class="container announce-book">
            <form method="POST" action="<?php echo URLROOT; ?>/books/editbookannounce/<?php echo $data['announce']->id_books; ?>">
                <div class="row mt-4">
                    <div class="col-12 mx-auto">
                        <h1 style="text-align: center;">Editar Anúncio</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="form-outline mb-4">
                        <input type="text" id="editNameField" name="editName" class="form-control" value="<?php echo $data['announce']->book_name; ?>" />
                        <label class="form-label" for="form4Example1">Titulo do Livro</label>
                        <span id="propError" style="display: none;">(Campo Inválido)</span>
                    </div>
                </div>

                <div class="row mb-4">
                <div class="col-md-6">
                        <div style="float:right;">
                            <select class="form-control form-control-lg" id="bookCondition" name="bookCondition">
                                <optgroup label="Condição">
                                    <option value="0">Selecione</option>
                                    <option value="Semi-novo">Semi-novo</option>
                                    <option value="Boa">Boa</option>
                                    <option value="Velho">Velho</option>
                                    <option value="Péssima">Péssima</option>
                                </optgroup>
                            </select>
                            <span id="condiError" style="display: none">(Selecione uma opção)</span>
                        </div>
                    </div>
                    <div class="col-md-6">
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

                <div class="row">
                    <div class="form-outline mb-4">
                        <textarea type="text" class="form-control" name="synopsis" id="synopsis"><?php echo $data['announce']->synopsis; ?></textarea>
                        <label class="form-label" for="form4Example3">Sinopse</label>
                        <span id="synError" style="display: none;">(Campo Inválido)</span>
                    </div>
                </div>

                <button name="submit-btn" type="submit" class="btn btn-primary btn-block mb-4">Salvar Perfil</button>
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
                    let bookname = $('#editName').val();
                    let bookcondi = $('#bookCondition').val();
                    let trade = $('#trade').val();
                    let synopsis = $('#synopsis').val();

                    //Verifica��o de caracteres especiais pelo m�todo de Regex
                    var an = /\d/i;
                    var al = /\D/i;
                    var specialChar = /[#%$^~!&*()_+\-=\[\]{}"\\|<>\/]/g;
                    var emailtest = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    //Criando um array de booleanos, o formulario apenas sera enviado ao banco de dados se
                    //todas as verifica��es forem falso
                    arr.push(bookname.length == 0 || (fullname).match(an) ? true : false)
                    arr.push((bookname).match(specialChar) ? true : false)
                    arr.push(condition == 0 || condition == "0" ? true : false)
                    arr.push(trade == 0 || trade == "0" ? true : false)
                    arr.push(synopsis == "" ? true : false)

                    console.log(arr)

                    if (arr[0] || arr[1]) {
                        $('#propError').css("display", "inline")
                    }
                    if (arr[2]) {
                        $('#condiError').css("display", "inline")
                    }
                    if (arr[3]) {
                        $('#trade').css("display", "inline")
                    }
                    if (arr[4]) {
                        $('#synError').css("display", "inline")
                    }
                    return arr.includes(true) ? false : true
                })
            });
        </script>

    <?php require APPROOT . '/views/inc/footer.php'; ?>