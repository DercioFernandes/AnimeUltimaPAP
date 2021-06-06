<nav id="navbar" class="navbar navbar-expand-lg navbar-custom navShadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=base_url()?>">
            <img src="<?=base_url('/resources/img/logo/animeprimeralargenewc.png')?>" alt="logo" class="img-fluid" id="logo">
        </a>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <form class="form-inline ml-auto">
                <input class="form-control ml-auto " type="search" placeholder="Search" aria-label="Search">
            </form>
            <ul class="navbar-nav ml-auto ">
                <?php
                    if(!empty($user)):
                ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=base_url('login/logout')?>">Logout</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img id="pfp" src="<?php echo base_url('./resources/img/pfp/' . $fotoPerfil) ?>" title="fotoDePerfil"  />
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if($perms == 1): ?>
                                <a class="dropdown-item" href="<?=base_url('serie')?>">Gerir</a>
                            <?php endif; ?>
                            <a class="dropdown-item" href="#">Settings</a>
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
