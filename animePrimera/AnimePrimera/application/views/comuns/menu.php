<nav id="navbar" class="navbar navbar-expand-lg navbar-custom navShadow py-0">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=base_url()?>">
            <img src="<?=base_url('/resources/img/logo/animeprimeralargenewc.png')?>" alt="logo" class="img-fluid" id="logo">
        </a>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <!--<form class="form-inline ml-auto">
                <input class="form-control ml-auto" type="search" placeholder="Search" aria-label="Search">
            </form>-->
            <div class="input-group searchdiv">
                <!--<form class="input-group searchdiv" method="post" enctype="multipart/form-data">
                    <input type="text" class="form-control" placeholder="Search (Ex: Kimetsu no Yaiba)" name="animename" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <a class="btn searchbtn" id="button-addon2" href="<?php echo base_url($contSearch) ?>">Search</a>
                    </div>
                </form>-->
                <form class="input-group searchdiv" action="<?= base_url($contSearch)?>" method="post" enctype="multipart/form-data">
                    <input type="text" class="form-control" placeholder="Search (Ex: Kimetsu no Yaiba)" name="animename" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <input class="form-control btn searchbtn" type="submit" class="btn btn-primary" name="Search" value="Search">
                    </div>
                </form>
            </div>
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('Hub')?>"> HUB </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('Calendario')?>"> CALENDÁRIO </a>
                </li>
                <?php
                    if(!empty($user)):
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img id="pfp" src="<?php echo base_url('./resources/img/pfp/' . $fotoPerfil) ?>" title="fotoDePerfil"  />
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?=base_url('user/myprofile/' . $idUser)?>">Meu Perfil</a>
                            <?php if($perms == 3 || $perms == 4 || $perms == 5): ?>
                                <a class="dropdown-item" href="<?=base_url('logs/general')?>">Gerir Logs</a>
                                <?php if($perms == 5): ?>
                                    <a class="dropdown-item" href="<?=base_url('user/gerirUser')?>">Gerir Users</a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <button class="dropdown-item" data-toggle="modal" data-target="#request"> Solicitar Nova Série </button>
                            <?php if($perms < 3): ?>
                            <a class="dropdown-item" href="<?=base_url('User/goPremium')?>">Go Premium</a>
                            <?php endif; ?>
                            <a class="dropdown-item" href="<?=base_url('login/logout')?>">LOGOUT</a>
                        </div>
                    </li>
                <?php
                    else:
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('register')?>">REGISTRAR</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=base_url('login')?>">LOGIN</a>
                    </li>
                <?php
                    endif;
                ?>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Solicitar Série</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('RequestAnime/addRequest')?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idUser" value="<?php if(isset($idUser)){ echo $idUser; } ?>">
                    <h6>Nome da Série: </h6>
                    <input class="form-control" type="text" name="titulo" placeholder="Nome da Série" required="required">
                    <br>
                    <h6>Link (Opcional): </h6>
                    <input class="form-control" type="text" name="link" placeholder="Link Informativo" >
                    <input class=" seguir btn-block" type="submit" class="btn btn-primary" name="ratesubmited" value="Submeter">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$error = $this->session->flashdata('error');
if($error): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $error ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>