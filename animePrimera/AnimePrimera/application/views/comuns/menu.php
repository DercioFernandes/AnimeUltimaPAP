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
                            <?php if($perms == 4 || $perms == 5): ?>
                                <a class="dropdown-item" href="<?=base_url('logs/general')?>">Gerir Logs</a>
                            <?php endif; ?>
                            <a class="dropdown-item" href="<?=base_url('login/logout')?>">Logout</a>
                        </div>
                    </li>
                <?php
                    else:
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('register')?>">Registrar</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=base_url('login')?>">Login</a>
                    </li>
                <?php
                    endif;
                ?>
        </div>
    </div>
</nav>
