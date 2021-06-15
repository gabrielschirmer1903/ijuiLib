<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">

    <div style="border-bottom:2px solid black;" class="row my-3">
        <div class="col-md-3 offset-1 bottom-liner">
            <h1>Ofertas Recebidas</h1>
        </div>
    </div>
    <div class="row">
        <?php
        if (!empty($data['offer'])) :
            foreach ($data['offer'] as $offer) : ?>
                <div class="card card-body mb-3">
                    <h4 class="card-title">Seu livro: <?php echo $offer->book_name; ?></h4>
                    <div class="bg-light p-2 mb-3">
                        Ofertante: <?php echo $offer->name; ?>. No dia: <?php echo $offer->offer_date; ?><br>
                        Email para contato: <?php echo $offer->email; ?><br>
                        Telefone: <?php echo $offer->phone; ?>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Mensagem do ofertante: <?php echo $offer->message; ?>
                        </div>
                        <div class="col-6">
                            <img class="max-size" src="<?php echo URLROOT; ?>/img/offerimages/<?php echo $offer->offered_book_image; ?>" alt="asd">
                        </div>
                    </div>
                </div>
    </div>
<?php endforeach ?>
<?php else: ?>
<h2>Nenhuma oferta recebida</h2>
<?php endif ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>