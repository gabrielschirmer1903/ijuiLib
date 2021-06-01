<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="https://miro.medium.com/max/3200/1*g09N-jl7JtVjVZGcd-vL2g.jpeg" alt="" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h2>
                            Seja bem-vindo, <?php echo $data['user']->name; ?>!
                        </h2>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <p class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Informações</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo URLROOT; ?>/users/editprofile" class="btn btn-primary">Editar Perfil</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <p class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Informações</p>
                            </li>
                        </ul>
                    <div class="profile-work">
                        <p>Ações</p>
                        <button class="btn btn-primary">Ver meus posts</button>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $data['user']->email; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Cidade</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $data['user']->city; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Endereço</label>
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
                                    <label>Telefone</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $data['user']->phone; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hourly Rate</label>
                                </div>
                                <div class="col-md-6">
                                    <p>10$/hr</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Total Projects</label>
                                </div>
                                <div class="col-md-6">
                                    <p>230</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>English Level</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Availability</label>
                                </div>
                                <div class="col-md-6">
                                    <p>6 months</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Your Bio</label><br />
                                    <p>Your detail description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>