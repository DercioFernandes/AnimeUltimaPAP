<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3 id="centered" class="text-center"> <?php echo $h3title ?> </h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="r" class="card-group">
                <?php
                if(!empty($episodios)):
                    foreach ($episodios as $episodio): ?>
                        <?php $temporadas = $this->main_model->get_main_where('temporadas','idTemporada',$episodio['idTemporada'])?>
                        <?php $serie = $this->main_model->get_main_where('series','idSerie',$temporadas[0]->idSerie); ?>
                        <a href="<?php echo base_url('/Episodio/watchepisode/' . $episodio['idEpisodio']) ?>">
                            <div class="card text-white bg-dark mb-3">
                                <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/' . $temporadas[0]->Thumbnail) ?>" alt="Thumbnail">
                                <div id="middle" class="card-body" >
                                    <h5 id="text" class="card-title"><?php echo $episodio['titulo'] ?></h5>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endif;  ?>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>
