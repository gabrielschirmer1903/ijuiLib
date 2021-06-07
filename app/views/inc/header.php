<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title><?php echo SITENAME; ?></title>
</head>
<header>
  <div>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top topnav">
      <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>/pages/index"><i class="fa fa-fw fa-home"></i> Estante Ijui</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/books/index"><i class="fas fa-clipboard-list"></i> Anúncios</a>
            </li>
            <?php if (isLoggendIn()) : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/books/add"><i class="fas fa-plus"></i> Crie seu anúncio</a>
            </li>
            <?php endif; ?>
            <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">u�</a>
          </li>-->
          </ul>
          <!-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
          <ul class="navbar-nav ml-auto mb-2 mb-md-0">
            <?php if (isLoggendIn()) : ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/users/profile"><i class="fa fa-fw fa-user"></i>Perfil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/users/logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/users/login"><i class="fa fa-fw fa-user"></i>Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/register"><i class="far fa-edit"></i>Registrar</a>
              </li>

            <?php endif; ?>
            <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">u�</a>
          </li>-->
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>