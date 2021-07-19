<nav id="navbar" class="navbar navbar-expand-lg navbar-custom navShadow py-0">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=base_url()?>">
            <img src="<?=base_url('/resources/img/logo/animeprimeralargenewc.png')?>" alt="logo" class="img-fluid" id="logo">
        </a>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"> + </span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <!--<form class="form-inline ml-auto">
                <input class="form-control ml-auto" type="search" placeholder="Search" aria-label="Search">
            </form>-->
            <div class="input-group searchdiv">
                <!--<form class="input-group searchdiv" method="post" enctype="multipart/form-data">
                    <input type="text" class="form-control" placeholder="Search (Ex: Kimetsu no Yaiba)" name="animename" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <a class="btn searchbtn" id="button-addon2" href="<?php echo base_url(
                                $contSearch) ?>">Search</a>
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
                    <li>
                        <a class="nav-link" data-toggle="modal" data-target="#notifications" role="button" aria-haspopup="true" aria-expanded="false">
                            <!--<svg class="bellicon" src="<?php echo base_url('./resources/img/Icons/sino.svg') ?>" title="fotoDePerfil" />-->
                            <svg class="bellicon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 174.239 174.239" style="enable-background:new 0 0 174.239 174.239;" xml:space="preserve">
<path d="M163.989,137.901c-25.402-15.679-24.033-66.635-24.011-67.399c0-23.788-15.807-43.943-37.466-50.551v-4.56
	C102.511,6.906,95.606,0,87.12,0S71.728,6.906,71.728,15.392v4.56C50.069,26.564,34.263,46.759,34.267,70.76
	c0.491,14.249-2.868,54.088-24.016,67.141c-2.839,1.753-4.171,5.18-3.26,8.394c0.912,3.211,3.843,5.428,7.183,5.428h44.707
	c2.954,12.875,14.481,22.516,28.239,22.516s25.285-9.641,28.239-22.516h44.707c3.34,0,6.271-2.217,7.183-5.428
	C168.16,143.081,166.828,139.654,163.989,137.901z M80.423,136.788H32.522c17.835-25.171,16.741-64.487,16.675-66.285
	c0-20.907,17.013-37.918,37.928-37.918c20.907,0,37.918,17.011,37.923,37.66c-0.07,2.013-1.164,41.367,16.67,66.543H80.423z"/>

                            <?php if(!empty($notif)): ?>
                                <img class="badge1" src="<?php echo base_url('./resources/img/Icons/notification.png') ?>" title=""/>
                            <?php endif; ?>
                        </a>
                    </li>
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
                            <a class="dropdown-item" href="<?=base_url('User/goPremium')?>">Doar Dinheiro</a>
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
<div class="modal fade" id="notifications" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Minhas Notificações</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if(!empty($notif)): ?>
                    <?php foreach ($notif as $notificacao): ?>
                        <div class="notif">
                            <a href="<?php if($notificacao['idEpisodio']>0){
                                        echo base_url('Episodio/watchepisode/'.$notificacao['idEpisodio']);
                                    }elseif ($notificacao['idCompost']>0){
                                        echo base_url('Hub/hubinfo/'.$notificacao['idCompost']);
                                    }elseif ($notificacao['idSerie']>0){
                                        echo base_url('Serie/seriesinfo/'.$notificacao['idSerie']);
                                    } ?>">
                                <h6 class="notifinfo"><?php echo $notificacao['info'] ?></h6>
                                <a href="<?php echo base_url('Notificacoes/removerNotification/'.$notificacao['idNotification'])?>">
                                    <svg class="removenotif"  viewBox="0 0 329.26933 329"  xmlns="http://www.w3.org/2000/svg"><path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0"/></svg>
                                </a>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <hr>
                <a class="text-center clearAll" href="<?php echo base_url('Notificacoes/clearAll')?>">Limpar Todas</a>
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