<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container emp-profile">
    <form method="post">
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="<?php echo URLROOT; ?>/img/userimages/<?php echo $data['user']->user_image; ?>" style="height: 100%; width: 80%; display: block;" alt="user-img" />
                    <!-- <form id="changeImage" name="changeUserImage" action="<?php echo URLROOT; ?>/users/changeuserimage">
                        <input class="form-control" type="file" id="inputForm" name="bookImage" />
                        <span>Mude sua foto</span>
                    </form> -->
                </div>

            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h2>
                        Seja bem-vindo, <?php echo $data['user']->name; ?>!
                    </h2>
                </div>
            </div>
            <div class="col">
                <div class="mb-5">
                    <a style="width: 106px !important; font-size: 0.8rem !important" href="<?php echo URLROOT; ?>/users/editprofile" class="btn btn-primary">Editar Perfil</a>
                    <div class="pb-2"></div>
                    <a style="width: 106px !important; font-size: 0.8rem !important" href="<?php echo URLROOT; ?>/users/changepassword" class="btn btn-warning">Alterar Senha</a>  
                </div>
            </div>
                 

        </div>
        <div class="row">
            <div class="col-md-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <p class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ações</p>
                    </li>
                </ul>
                <div class="profile-work">
                    <p></p>
                    <div>
                        <a style="color: white !important;" class="btn btn-primary" href="<?php echo URLROOT; ?>/books/showuserposts">Ver meus posts</a><br><br>
                        <a style="color: white !important;" class="btn btn-primary" href="<?php echo URLROOT; ?>/offers/fetchusermadeoffers">Minhas Ofertas</a><br><br>
                        <a style="color: white !important;" class="btn btn-primary" href="<?php echo URLROOT; ?>/offers/fetchReceviedOffers">Ofertas Recebidas</a>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <p class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Informações</p>
                    </li>
                </ul>
                <div class="tab-content profile-tab" id="myTabContent">
                    <div id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label>E-mail:</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $data['user']->email; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Cidade:</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $data['user']->city; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Endereço:</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $data['user']->address; ?>, N°<?php echo $data['user']->address_number; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Membros desde: </label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $data['user']->reg_date; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Telefone:</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $data['user']->phone; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- <script>
    const inputForm = document.getElementById('inputForm');
    const formImage = document.getElementById('changeImage');
    console.log(formImage)

    document.getElementById("inputForm").onchange = function() {
        console.log('asdasd');
        form.submit();
    }
</script> -->

<?php require APPROOT . '/views/inc/footer.php'; ?>