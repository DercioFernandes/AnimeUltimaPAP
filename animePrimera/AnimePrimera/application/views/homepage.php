<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="<?=base_url('User/goPremium')?>">
                            <img class="d-block w-100" src="<?=base_url('/resources/img/Carrousel/PremiumAdd.png')?>" alt="First slide">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?=base_url('/resources/img/Carrousel/kmaad2.png')?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?=base_url('/resources/img/Carrousel/kscc.png')?>" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3 id="centered" class="text-center"> Adicionados Recentemente </h3>
        </div>
    </div>
    <div class="row ">
        <div class="col">
            <div id="r" class="card-group">
                <?php
                if(!empty($episodios)):
                    foreach ($episodios as $episodio): ?>
                    <?php $temporadas = $this->main_model->get_main_where('temporadas','idTemporada',$episodio['idTemporada'])?>
                    <?php $serie = $this->main_model->get_main_where('series','idSerie',$temporadas[0]->idSerie); ?>
                    <a class="c" href="<?php echo base_url('/Episodio/watchepisode/' . $episodio['idEpisodio']) ?>">
                        <div class="card text-white bg-dark mb-3">
                            <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/' . $temporadas[0]->Thumbnail) ?>" alt="Thumbnail">
                            <div id="middle" class="card-body" >
                                <h5 id="text" class="card-title"><?php echo $episodio['titulo'] ?></h5>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                <?php endif;  ?>
                <a href="<?php echo base_url('episodio/allEpisodio')?>">
                    <div class="card text-white bg-dark mb-3">
                        <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/+.png')?>" alt="Thumbnail">
                        <div id="middle" class="card-body">
                            <h5 id="text" class="card-title">+ Episódios</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="https://www.mcdonalds.pt/">
                    <img class="d-block w-100" src="<?=base_url('/resources/img/Carrousel/mcdonaldsad.png')?>" alt="Second slide">
                </a>
            </div>
            <div class="carousel-item">
                <a href="https://www.coca-cola.com/">
                    <img class="d-block w-100" src="<?=base_url('/resources/img/Carrousel/cocacolaad.png')?>" alt="First slide">
                </a>
            </div>
            <div class="carousel-item">
                <a href="https://www.mcdonalds.pt/">
                    <img class="d-block w-100" src="<?=base_url('/resources/img/Carrousel/mcdonaldsad.png')?>" alt="Second slide">
                </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3 id="centered" class="text-center"> Séries Favoritas da Comunidade </h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="r" class="card-group">
                <?php foreach ($favseries as $serie): ?>
                    <a href="<?php echo base_url('/serie/seriesinfo/' . $serie['idSerie']) ?>">
                        <div class="card text-white bg-dark mb-3">
                            <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/' . $serie['Photo']) ?>" alt="Thumbnail">
                            <div id="middle" class="card-body">
                                <h5 id="text" class="card-title"><?php echo $serie['Titulo'] ?></h5>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class="btn-block suprise button text-center" id="surprise" href="<?php echo base_url('/serie/seriesinfo/' . $seriessuprise[$suprise]['idSerie']) ?>"><b>Supreenda-me!</b></a>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <h3 id="centered" class="text-center"> Series Recentes </h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="r" class="card-group">
                <?php foreach ($series as $serie): ?>
                    <a href="<?php echo base_url('/serie/seriesinfo/' . $serie['idSerie']) ?>">
                        <div class="card text-white bg-dark mb-3">
                            <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/' . $serie['Photo']) ?>" alt="Thumbnail">
                            <div id="middle" class="card-body">
                                <h5 id="text" class="card-title"><?php echo $serie['Titulo'] ?></h5>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <a href="<?php echo base_url('serie/allSeries')?>">
                    <div class="card text-white bg-dark mb-3">
                        <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/+.png')?>" alt="Thumbnail">
                        <div id="middle" class="card-body">
                            <h5 id="text" class="card-title">+ Series</h5>
                        </div>
                    </div>
                </a>
                <?php
                if(!empty($user)):
                ?>
                    <?php if($perms == 3 || $perms == 4 || $perms == 5): ?>
                    <a style="margin-bottom: 5px; margin-top: 5px; margin-left: 5px; margin-right: 5px" class="btn btn-success btn-lg btn-block" href="<?php echo base_url('serie/add') ?>">Adicionar Série</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>
