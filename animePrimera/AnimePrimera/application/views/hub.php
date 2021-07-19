<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div class="container-fluid">
    <div class="row">
        <div id="npm" class="col-sm">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="spcBody" src="<?php echo base_url('resources/img/Carrousel/staffannouncements.png') ?>"/>
                    </div>
                    <?php foreach ($staffpost as $post): ?>
                        <div class="carousel-item">
                            <a href="<?php echo base_url('hub/hubinfo/' . $post['idCompost']) ?>">
                                <div class="staffPostCarousel">
                                    <div class="spcHeader">
                                        <h3 class="text-center"><?php echo $post['titulo'] ?></h3>
                                    </div>
                                    <div class="spcBody">
                                        <p>
                                            <?php if(!empty($post['video'])): ?>
                                                <video class="videoHub" id="video" controls width="auto">
                                                    <source src="<?php echo base_url($post['video']);?>"
                                                            type="video/mp4">
                                                    Sorry, your browser doesn't support embedded videos.
                                                </video>
                                            <?php elseif(!empty($post['img'])): ?>
                                                <img class="compostimg" src="<?php echo base_url('resources/img/compost/' . $post['img']) ?>"/>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div id="npm" class="col-sm">
            <h4 class="mlptitle text-center">Favoritos da Comunidade</h4>
            <ul class="mlplist">
                <?php foreach($comfav as $q): ?>
                <?php if($q['status'] == 0): ?>
                <li class="mlplistitem">
                    <a href="<?php echo base_url('hub/hubinfo/'.$q['idCompost']) ?>">
                        <?php echo $q['titulo'] ?>
                    </a>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center hubt"> HUB </h3>
            <p class="text-center hubp"> Bem Vindo ao HUB!<br/> O HUB é um fórum da Anime Primera. Aqui podes publicar mensagens sobre séries ou filmes que viste e podes até mesmo publicar Imagens ou Vídeos! Ao mesmo tempo, a Staff irá publicar trailers e fazer comunicados oficiais aqui. </p>
        </div>
    </div>
    <?php
    if(!empty($user)):
        ?>
        <a class="hubbtn text-center" href="<?php echo base_url('hub/criarPost') ?>">Publicar</a>
    <?php endif; ?>

    <div class="row">
        <?php foreach($posts as $p): ?>
        <?php if($p['status'] == 0): ?>
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
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="col">
            <a href="<?php echo base_url('hub/allPost')?>">
                <h6 class="hubbtn text-center"> Ver Todos</h6>
            </a>
        </div>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>
