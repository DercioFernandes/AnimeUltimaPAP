<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div class="container-fluid">
    <div class="row" style="background-image: url(<?php if(isset($bannerUrl)){echo $bannerUrl;} ?>); background-repeat: no-repeat; background-size: cover;" >
    <div class="col">
            <img class="myprofilepfp text-center" src="<?php echo base_url('./resources/img/pfp/' . $userinfo[0]['FotoPerfil']) ?>" title="userPFP" alt="userPFP"/>
            <h3 class="mypusername"><b>Username: </b><small><?php echo $userinfo[0]['Username'] ?></small></h3>
            <?php if(isset($perms)): ?>
                <?php if($perms == 5): ?>
                <a class="btn-block text-center mypedit" href="<?php echo base_url('user/editUser/' . $userinfo[0]['idUser']) ?>">Editar Perfil</a>
                <?php endif; ?>
                <?php if($perms == 4 || $perms == 5): ?>
                <button class="btn-block text-center myban" data-toggle="modal" data-target="#ban"> Banir </button>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3 id="centered" class="text-center"> Favoritos de <?php echo $userinfo[0]['Username'] ?> </h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="r" class="card-group">
                <?php foreach ($serieFav as $serie): ?>
                    <a href="<?php echo base_url('/serie/seriesinfo/' . $serie['idSerie']) ?>">
                        <div class="card text-white bg-dark mb-3">
                            <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/' . $serie['Photo']) ?>" alt="Thumbnail">
                            <div id="middle" class="card-body">
                                <h5 id="text" class="card-title"><?php echo $serie['Titulo'] ?></h5>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <a href="<?php echo base_url('user/allSeriesFav/' . $userinfo[0]['idUser'])?>">
                    <div class="card text-white bg-dark mb-3">
                        <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/+.png')?>" alt="Thumbnail">
                        <div id="middle" class="card-body">
                            <h5 id="text" class="card-title">+ Series</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3 id="centered" class="text-center"> Séries que <?php echo $userinfo[0]['Username']?> segue </h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="r" class="card-group">
                <?php foreach ($serieSeg as $serie): ?>
                    <a href="<?php echo base_url('/serie/seriesinfo/' . $serie['idSerie']) ?>">
                        <div class="card text-white bg-dark mb-3">
                            <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/' . $serie['Photo']) ?>" alt="Thumbnail">
                            <div id="middle" class="card-body">
                                <h5 id="text" class="card-title"><?php echo $serie['Titulo'] ?></h5>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <a href="<?php echo base_url('user/allSeriesSeg/' . $userinfo[0]['idUser'])?>">
                    <div class="card text-white bg-dark mb-3">
                        <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/+.png')?>" alt="Thumbnail">
                        <div id="middle" class="card-body">
                            <h5 id="text" class="card-title">+ Series</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h3 id="centered" class="text-center"> Séries que <?php echo $userinfo[0]['Username'] ?> está a ver </h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="r" class="card-group">
                <?php foreach ($serieAss as $serie): ?>
                    <a href="<?php echo base_url('/serie/seriesinfo/' . $serie['idSerie']) ?>">
                        <div class="card text-white bg-dark mb-3">
                            <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/' . $serie['Photo']) ?>" alt="Thumbnail">
                            <div id="middle" class="card-body">
                                <h5 id="text" class="card-title"><?php echo $serie['Titulo'] ?></h5>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <a href="<?php echo base_url('user/allSeriesAss/' . $userinfo[0]['idUser'])?>">
                    <div class="card text-white bg-dark mb-3">
                        <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/+.png')?>" alt="Thumbnail">
                        <div id="middle" class="card-body">
                            <h5 id="text" class="card-title">+ Series</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h3 id="centered" class="text-center"> Séries em Espera </h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="r" class="card-group">
                <?php foreach ($serieHol as $serie): ?>
                    <a href="<?php echo base_url('/serie/seriesinfo/' . $serie['idSerie']) ?>">
                        <div class="card text-white bg-dark mb-3">
                            <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/' . $serie['Photo']) ?>" alt="Thumbnail">
                            <div id="middle" class="card-body">
                                <h5 id="text" class="card-title"><?php echo $serie['Titulo'] ?></h5>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <a href="<?php echo base_url('user/allSeriesHol/' . $userinfo[0]['idUser'])?>">
                    <div class="card text-white bg-dark mb-3">
                        <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/+.png')?>" alt="Thumbnail">
                        <div id="middle" class="card-body">
                            <h5 id="text" class="card-title">+ Series</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h3 id="centered" class="text-center"> Séries Completas </h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="r" class="card-group">
                <?php foreach ($serieCom as $serie): ?>
                    <a href="<?php echo base_url('/serie/seriesinfo/' . $serie['idSerie']) ?>">
                        <div class="card text-white bg-dark mb-3">
                            <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/' . $serie['Photo']) ?>" alt="Thumbnail">
                            <div id="middle" class="card-body">
                                <h5 id="text" class="card-title"><?php echo $serie['Titulo'] ?></h5>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <a href="<?php echo base_url('user/allSeriesCom/' . $userinfo[0]['idUser'])?>">
                    <div class="card text-white bg-dark mb-3">
                        <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/+.png')?>" alt="Thumbnail">
                        <div id="middle" class="card-body">
                            <h5 id="text" class="card-title">+ Series</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h3 id="centered" class="text-center"> Séries Dropadas </h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="r" class="card-group">
                <?php foreach ($serieDro as $serie): ?>
                    <a href="<?php echo base_url('/serie/seriesinfo/' . $serie['idSerie']) ?>">
                        <div class="card text-white bg-dark mb-3">
                            <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/' . $serie['Photo']) ?>" alt="Thumbnail">
                            <div id="middle" class="card-body">
                                <h5 id="text" class="card-title"><?php echo $serie['Titulo'] ?></h5>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <a href="<?php echo base_url('user/allSeriesDro/' . $userinfo[0]['idUser'])?>">
                    <div class="card text-white bg-dark mb-3">
                        <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/+.png')?>" alt="Thumbnail">
                        <div id="middle" class="card-body">
                            <h5 id="text" class="card-title">+ Series</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3 id="centered" class="text-center"> Posts de <?php echo $userinfo[0]['Username'] ?></h3>
        </div>
    </div>
    <div class="row">
        <?php foreach($myPosts as $p): ?>
            <div class="col-sm-4 md-4 lg-4">
                <a class="smallPost" href="<?php echo base_url('hub/hubinfo/' . $p['idCompost']) ?>">
                    <div class="smallPost">
                        <div class="smallPostHeader">
                            <?php echo $p['titulo'] ?>
                        </div>
                        <div class="smallPostBody">
                            <?php if(!empty($p['video'])): ?>
                                <video class="videoHub" id="video" controls width="auto">
                                    <source src="<?php echo base_url($p['video']);?>"
                                            type="video/mp4">
                                    Sorry, your browser doesn't support embedded videos.
                                </video>
                            <?php elseif(!empty($p['img'])): ?>
                                <img class="compostimg" src="<?php echo base_url('resources/img/compost/' . $p['img']) ?>"/>
                            <?php endif; ?>
                        </div>
                        <div class="smallPostFooter">
                            Autor: <small>
                                <?php
                                $queryautor = $this->main_model->get_main_where_array('user','idUser',$p['idUser']);
                                echo $queryautor[0]['Username'] ?>
                            </small>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="col">
            <a href="<?php echo base_url('User/allMyPosts/'. $userinfo[0]['idUser'])?>">
                <h6 class="hubbtn text-center"> Ver Todos</h6>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3 id="centered" class="text-center"> Posts Curtidos por <?php echo $userinfo[0]['Username'] ?></h3>
        </div>
    </div>
    <div class="row">
        <?php foreach($likedPosts as $p): ?>
            <div class="col-sm-4 md-4 lg-4">
                <a class="smallPost" href="<?php echo base_url('hub/hubinfo/' . $p['idCompost']) ?>">
                    <div class="smallPost">
                        <div class="smallPostHeader">
                            <?php echo $p['titulo'] ?>
                        </div>
                        <div class="smallPostBody">
                            <?php if(!empty($p['video'])): ?>
                                <video class="videoHub" id="video" controls width="auto">
                                    <source src="<?php echo base_url($p['video']);?>"
                                            type="video/mp4">
                                    Sorry, your browser doesn't support embedded videos.
                                </video>
                            <?php elseif(!empty($p['img'])): ?>
                                <img class="compostimg" src="<?php echo base_url('resources/img/compost/' . $p['img']) ?>"/>
                            <?php endif; ?>
                        </div>
                        <div class="smallPostFooter">
                            Autor: <small>
                                <?php
                                $queryautor = $this->main_model->get_main_where_array('user','idUser',$p['idUser']);
                                echo $queryautor[0]['Username'] ?>
                            </small>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="col">
            <a href="<?php echo base_url('User/allMyLikedPosts/' . $userinfo[0]['idUser'])?>">
                <h6 class="hubbtn text-center"> Ver Todos</h6>
            </a>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ban" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>Rate</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('User/banUser/' . $userinfo[0]['idUser'])?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idUser" value="<?php if(isset($idUser)){ echo $idUser; } ?>">
                        <h6>Razão:</h6>
                        <textarea class="reason" name="reason" required="required"></textarea>
                        <input class=" seguir btn-block" type="submit" class="btn btn-primary" name="ratesubmited" value="Submeter">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>
