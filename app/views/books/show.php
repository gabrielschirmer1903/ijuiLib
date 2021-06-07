<?php require APPROOT . '/views/inc/header.php'; ?>

<body>

    <a href="<?php echo URLROOT; ?>/books/index" class="btn btn-primary"><i class="fa fa-backwards"></i>Voltar</a>
    <div class="container shadow-lg border">
        <div class="row pl-5 flex-lg-row-reverse align-items-center py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="<?php echo URLROOT; ?>/img/bookimages/<?php echo $data['announce']->book_image; ?>" class="d-block mx-lg-auto img-fluid" alt="Display">
            </div>
            <div class="col-lg-6">
                <div>
                    <h1 class="display-5 fw-bold  mb-5" style="border-bottom:2px solid black;">Titulo: <?php echo $data['announce']->book_name; ?></h1>
                    <p class="mb-5">Sinopse: <?php echo $data['announce']->synopsis; ?></p>
                    <p class="mb-2">Proprietário: <?php echo $data['announce']->name; ?></p>
                    <p class="mb-2">Condição do livro: <?php echo $data['announce']->condi; ?></p>
                    <p class="mb-5">Tipo de troca: <?php echo $data['announce']->trade; ?></p>
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <?php if ($_SESSION['user_id'] == $data['announce']->id_user) : ?>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <a href="<?php echo URLROOT; ?>/books/editbookannounce/<?php echo $data['announce']->id_books; ?>" type="button" class="btn btn-warning  px-4 me-md-2">Editar Informações</a>
                                <a type="button" class="btn btn-warning  px-4 me-md-2">Trocar Imagem</a>
                                <form class="pull-right" action="<?php echo URLROOT; ?>/books/deleteannounce/<?php echo $data['announce']->id_books; ?>" method="POST">
                                    <input type="submit" value="Deletar" class="btn btn-danger">
                                </form>
                            </div>
                        <?php endif ?>
                        <?php if ($_SESSION['user_id'] != $data['announce']->id_user) : ?>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <a type="button" class="btn btn-warning  px-4 me-md-2">Fazer Oferta</a>
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">

                    </div>
                </div>
            </div>

        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>