<?php require APPROOT . '/views/inc/header.php'; ?>

<body>

<a href="<?php echo URLROOT; ?>/books/index" class="brn btn-primary"><i class="fa fa-backwards"></i>Voltar</a>
    <div id="navbar-placeholder"></div>
    <div class="container shadow-lg border bg-book">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="<?php echo $data['announce']->book_image;?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold  mb-3"><?php echo $data['announce']->book_name;?></h1>
                <p class="p-inspect lead" style="color: white"><?php echo $data['announce']->synopsis; ?></p>
                <p style="color: white">Proprietário: <?php echo $data['announce']->name; ?></p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-warning btn-lg px-4 me-md-2">Oferecer troca</button>
                </div>
            </div>
        </div>
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>