<body>
    <?php require APPROOT . '/views/inc/header.php'; ?>

    <main>
        <br><br>
        <form action="<?php echo URLROOT; ?>/offers/createoffer" method="POST" enctype="multipart/form-data">
            <div class="container announce-book">
                <div class="row my-5 ">
                    <div class="col-6 mx-auto">
                        <h1>Faça uma oferta para o livro: <br>
                            <p style="font-weight: bold;"><?php echo $data['book_info']->book_name; ?></p>
                        </h1>
                    </div>
                </div>
                <input type="hidden" name="id_book_owner" value="<?php echo $data['book_info']->id_user; ?>">
                <input type="hidden" name="id_book" value="<?php echo $data['book_info']->id_books; ?>">
                <div class="row pb-3">
                    <div class="col-12">
                        <div class="styled-input wide">
                            <textarea class="form-control" name="synopsis" id="synopsis" placeholder="Escreva uma proposta" required></textarea>
                            <label><span id="sinError" style="display: none">(Preencha)</span></label>
                        </div>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-6">
                        <div>
                            <span>Envie uma foto de seu livro</span>
                            <label style="color: white;">Envie uma foto de seu livro <span id="imgError" style="display: none">(Porfavor, insira uma imagem váldia)</span></label>
                            <input class="form-control" type="file" id="offerImage" name="offerImage" placeholder="Envia uma foto do seu livro">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="offset-3 col">
                        <button id="submit-btn" name="submit-btn" class="btn btn-lg btn-primary">Enviar</button>
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/books/bookinfo/<?php echo $data['book_info']->id_books; ?>" type="button" class="btn btn-lg btn-danger">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </main>
    
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            console.log('asdasd');


            $("#submit-btn").on('click', function() {
                let arr = []
                // let fullname = $('#fullname').val();
                let synopsis = $('#synopsis').val();
                let image = $('#offerImage').val();
                let imageSplit = image.split('.').pop();

                //Verifica��o de caracteres especiais pelo m�todo de Regex
                var an = /\d/i;
                var al = /\D/i;
                var specialChar = /[#%$^~!&*()_+\-=\[\]{}"\\|<>\/]/g;

                //Criando um array de booleanos, o formulario apenas sera enviado ao banco de dados se
                //todas as verifica��es forem falso
                arr.push(synopsis == "" ? true : false)

                if ((imageSplit.toLowerCase() == 'jpg') || (imageSplit.toLowerCase() == 'png') || (imageSplit.toLowerCase() == 'jpeg')) {
                    arr.push(false);
                } else {
                    arr.push(true);
                }

                console.log(arr)

                if (arr[0]) {
                    $('#sinError').css("display", "inline")
                }
                if (arr[1]) {
                    $('#imgError').css("display", "inline")
                }

                return arr.includes(true) ? false : true
            })
        });
    </script>
    <?php require APPROOT . '/views/inc/footer.php'; ?>