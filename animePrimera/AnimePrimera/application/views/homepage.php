<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3 id="centered"> Episódios Adicionados Recentemente </h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div id="r" class="card-group">
                <?php
                foreach ($episodios as $episodio): ?>
                <?php $temporadas = $this->main_model->get_main_where('temporadas','idTemporada',$episodio['idTemporada']);?>
                <?php $serie = $this->main_model->get_main_where('series','idSerie',$temporadas[0]->idSerie); ?>
                <a href="<?php echo base_url('/Episodio/watchepisode/' . $episodio['idEpisodio']) ?>">
                    <div class="card text-white bg-dark mb-3">
                        <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/' . $temporadas[0]->Thumbnail) ?>" alt="Thumbnail">
                        <div id="middle" class="card-body" >
                            <h5 id="text" class="card-title"><?php echo $serie[0]->Titulo ?> <?php echo $episodio['titulo'] ?></h5>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3 id="centered"> Series </h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="r" class="card-group">
                <?php foreach ($series as $serie): ?>
                    <a href="<?php echo base_url('/serie/seriesinfo/' . $serie['idSerie']) ?>">
                        <div class="card text-white bg-dark mb-3">
                            <img id="imagee" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/' . $serie['Photo']) ?>" alt="Thumbnail">
                            <div id="middle" class="card-body">
                                <h5 id="text" class="card-title"><?php echo $serie['Titulo'] ?></h5>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>
