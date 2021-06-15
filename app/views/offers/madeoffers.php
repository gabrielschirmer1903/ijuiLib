<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">

    <div style="border-bottom:2px solid black;" class="row my-3">
        <div class="col-md-3 offset-1 bottom-liner">
            <h1>Ofertas Feitas</h1>
        </div>
    </div>

    <?php
    if (!empty($data['offer'])) :
        foreach ($data['offer'] as $offer) : ?>
            <div class="row">
                <div class="card card-body mb-3">
                    <h4 class="card-title">Oferta feita no livro: <?php echo $offer->book_name; ?></h4>
                    <div class="bg-light p-2 mb-3">

                        <div class="col-12">
                            Sua mensagem para o dono do livro: <?php echo $offer->message; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" p-2 mb-3">
                            Proprietário: <?php echo $offer->name; ?>. No dia: <?php echo $offer->offer_date; ?><br>
                            Email para contato: <?php echo $offer->email; ?><br>
                            Telefone: <?php echo $offer->phone; ?>
                        </div>

                    </div>
                    <div class="pull-right">
                        <form class="pull-right" action="<?php echo URLROOT; ?>/offers/deleteoffer/<?php echo $offer->id_offer; ?>" method="POST">
                            <input type="submit" value="Deletar" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>

        <?php endforeach ?>
</div>
<?php else : ?>
    <h2>Nenhuma oferta feita</h2>
<?php endif ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>