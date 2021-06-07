<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">

    <div style="border-bottom:2px solid black;" class="row my-3">
        <div class="col-md-3 offset-1 bottom-liner">
            <h1>Anúncios</h1>
        </div>
        <?php if (isset($_SESSION['user_id'])) : ?>
            <div class="col-md-6">

                <a href="<?php echo URLROOT; ?>/books/add" class="btn btn-primary pull-right" style="float:right !important">
                    <i class="fa fa-pencil"></i> Publicar anúncio</a>

            </div>
        <?php endif ?>
    </div>
    <div class="row">
        <?php
        $i = 0;
        foreach ($data['books'] as $books) : ?>
            <div class="col-xl-3 py-1 ">
                <div class="card bg-book" style="width: 288px; height: 566px">
                    <img src="<?php echo URLROOT; ?>/img/bookimages/<?php echo $books->book_image; ?>" class="max-size" alt="">
                    <div class="card-body">
                        <h5 class="card-title bottom-liner" name="booktitle"> <?php echo $books->book_name; ?></h5>
                        <p class="card-text">Condições: <?php echo $books->condi; ?></p>
                        <p class="card-text">Tipo de troca: <?php echo $books->trade; ?></p>
                        <a href="<?php echo URLROOT; ?>/books/bookinfo/<?php echo $books->id_books; ?>" class="btn btn-secondary content_align stretched-link">Ver Anúncio</a>
                        <!-- Enviando o ID do livro dentro do banco de dados para a URL -->
                    </div>
                </div>
            </div>
            <?php
            $i++;
            //A cada 4 cards criados uma nova row (linha) ser� adiconada
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


<script>
var elements = document.getElementsByClassName('card-title');
for (const element of elements) {
    var title = element.textContent;
    if (title.length > 30) {
        element.textContent = title.substr(0 , 27) + " ..."
    }

}
</script>


<?php require APPROOT . '/views/inc/footer.php'; ?>