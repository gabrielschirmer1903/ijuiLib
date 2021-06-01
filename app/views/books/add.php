<?php require APPROOT . '/views/inc/header.php'; ?>

<body style="background-color: #444442 !important;">
    <main>
    <a href="<?php echo URLROOT; ?>/books/index" class="brn btn-primary"><i class="fa fa-backwards"></i>Voltar</a>
        <form action="<?php echo URLROOT; ?>/books/add" method="POST" enctype="multipart/form-data">
            <div class="container">
                
                <div class="col">
                    <h1>Anuncie seu Livro!</h1>
                </div>
                <div class="row input-container">
                    <!-- <div class="col-xs-12">
                        <div class="styled-input wide">
                            <input type="text" name="fullName" id="fullname" data-toggle="tooltip" title="Disabled tooltip" required />
                            <label>Nome do proprietário <span id="propError" style="display: none">(Campo Invalido)</span> </label>
                        </div>
                    </div> -->
                    <div class="col-xs-12">
                        <div class="styled-input wide">
                            <input type="text" name="bookName" id="bookname" required />
                            <label>Nome do Livro<span id="bnError" style="display: none">(Campo Invalido)</span></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="styled-input" style="float:right;">
                            <select id="bookCondition" name="bookCondition">
                                <optgroup label="Condição">
                                    <option value="0">Selecione</option>
                                    <option value="Semi-novo">Semi-novo</option>
                                    <option value="Boa">Boa</option>
                                    <option value="Velho">Velho</option>
                                    <option value="Péssima">Pessima</option>
                                </optgroup>
                            </select>
                            <span id="condiError" style="display: none">(Selecione uma opção)</span>
                        </div>
                        <div class="styled-input" style="float:left;">
                            <select id="trade" name="trade">
                                <optgroup label="Troca">
                                    <option value="0" select>Selecione</option>
                                    <option value="Permanente">Troca</option>
                                    <option value="Boa">Temporária</option>
                                </optgroup>
                            </select>
                            <span id="tradeError" style="display: none">(Selecione uma Opção)</span>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="styled-input wide">
                            <textarea name="synopsis" id="synopsis" required></textarea>
                            <label>Sinopse<span id="sinError" style="display: none">(Preencha)</span></label>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div>
                            <label style="color: white;">Envie uma foto de seu livro <span id="sinError" style="display: none">(Porfavor, insira uma imagem váldia)</span></label>
                            <input type="file" id="bookImage" name="bookImage">
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
            // let fullname = $('#fullname').val();
            let bookname = $('#bookname').val();
            let synopsis = $('#synopsis').val();
            let condition = $('#bookCondition option:selected').val();
            let trade = $('#trade option:selected').val();
            let image = $('#bookImage').val();
            let imageSplit = image.split('.').pop();

            //Verificação de caracteres especiais pelo método de Regex
            var an = /\d/i;
            var al = /\D/i;
            var specialChar = /[#%$^~!&*()_+\-=\[\]{}"\\|<>\/]/g;

            //Criando um array de booleanos, o formulario apenas sera enviado ao banco de dados se
            //todas as verificações forem falso
            // arr.push(fullname.length == 0 || (fullname).match(an) ? true : false)
            // arr.push((fullname).match(specialChar) ? true : false)
            arr.push(bookname.length == 0 ? true : false)
            arr.push(condition == 0 || condition == "0" ? true : false)
            arr.push(trade == 0 || trade == "0" ? true : false)
            arr.push(synopsis == "" ? true : false)

            arr.push(false)
            arr.push(false)

            if((imageSplit.toLowerCase() == 'jpg') || (imageSplit.toLowerCase() == 'png') ||  (imageSplit.toLowerCase() == 'jpeg')){
                arr.push(false);
            }else{arr.push(true);}

            console.log(arr)

            if (arr[0] || arr[1]) {
                $('#propError').css("display", "inline")
            }
            if (arr[2]) {
                $('#bnError').css("display", "inline")
            }
            if (arr[3]) {
                $('#condiError').css("display", "inline")
            }
            if (arr[4]) {
                $('#tradeError').css("display", "inline")
            }
            if (arr[5]) {
                $('#sinError').css("display", "inline")
            }
            if(arr[6]){
                $('#imgError').css("display", "inline")
            }
            return arr.includes(true) ? false : true
        })
    });

<?php require APPROOT . '/views/inc/footer.php'; ?>