<?php require APPROOT . '/views/inc/header.php'; ?>

<body style="background-color: #444442 !important;">

    <div class="row">
        <div class="col-md-3 offset-1">
            <h1>Anúncios</h1>
        </div>
        <?php if (isset($_SESSION['user_id'])) : ?>
            <div class="col-md-6">

                <a href="<?php echo URLROOT;
                            $i = 0; ?>/books/add" class="btn btn-primary pull-right" style="float:right !important">
                    <i class="fa fa-pencil"></i> Publicar anúncio</a>
                    <?php print_r($data); ?>

            </div>
        <?php endif ?>
    </div>
    <div class="container">
        <div class="row">
            <?php
            foreach ($data['books'] as $books) : ?>
                <div class="col-xl-3 py-1 ">
                    <div class="card bg-book" style="width: 18rem;">
                        <img src="<?php echo $books->book_img; ?>" class="card-img-top book-announce-size" alt="Imagem da card do livro" />
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $books->book_name; ?></h5>
                            <p class="card-text">Proprietário do livro: <?php echo $books->name; ?></p>
                            <a href="<?php echo URLROOT;?>/books/show/<?php echo $books->id_books; ?>" class="btn btn-secondary content_align stretched-link">Ver Anúncio</a>
                            <?php echo $books->id_books; ?>
                            <!-- Enviando o ID do livro dentro do banco de dados para a URL -->
                        </div>
                    </div>
                </div>
                <?php
                $i++;
                //A cada 4 cards criados uma nova row (linha) será adiconada
                if ($i % 4 == 0 && $i != count($data)) {
                ?>
        </div>
        <div class="row">
    <?php
                }
            endforeach
    ?>
        </div>
    </div>
    <img src="../../booksimages/2021.06.01-02.48.07-ASDASD.png" alt="asdasdasdsadsad">

    <?php require APPROOT . '/views/inc/footer.php'; ?>