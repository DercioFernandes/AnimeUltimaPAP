<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div class="container-fluid">
    <div class="row">
        <div id="npm" class="col">
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
        <div id="npm" class="col">
            <h4 class="mlptitle text-center">Favoritos da Comunidade</h4>
            <ul class="mlplist">
                <?php foreach($comfav as $q): ?>
                <li class="mlplistitem">
                    <a href="<?php echo base_url('hub/hubinfo/'.$q['idCompost']) ?>">
                        <?php echo $q['titulo'] ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3 class="text-center hubt"> HUB </h3>
            <p class="text-center hubp"> Bem Vindo ao HUB!<br/> O HUB é um fórum da Anime Primera. Aqui podes postar mensagens sobre séries ou filmes que viste e podes até mesmo postar Imagens ou Vídeos! Ao mesmo tempo, a Staff irá postar trailers e fazer comunicados oficiais aqui. </p>
        </div>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>
