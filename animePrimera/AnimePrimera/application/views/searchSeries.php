<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3 id="centered" class="text-center"> <?php echo $n ?> Resultados Encontrados </h3>
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
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>
