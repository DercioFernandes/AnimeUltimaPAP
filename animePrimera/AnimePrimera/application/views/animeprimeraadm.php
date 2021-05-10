<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

    <div class="container-fluid">
        <h1>ADM</h1>
        <?php
            foreach($series as $serie):
            ?>
                <div>
                    <h3><?php echo $serie['Titulo']?></h3>
                    <a style="margin-bottom: 5px; margin-top: 5px; margin-left: 5px; margin-right: 5px" class="btn btn-danger btn-lg btn-block" href="<?php echo base_url('temporada/addTemp/' . $serie['idSerie']); ?>"> Adicionar Temporada </a>
                    <?php
                    $temporadas = $this->main_model->get_main_where('temporadas','idSerie',$serie['idSerie']);
                    $i = 0;
                    foreach($temporadas as $temporada):
                        ?>
                        <h4> Temporada <?php echo $i++ ?></h4>
                        <a style="margin-bottom: 5px; margin-top: 5px; margin-left: 5px; margin-right: 5px" class="btn btn-danger btn-lg btn-block" href="<?php echo base_url('episodio/addEps/' . $temporada->idTemporada); ?>"> Adicionar Episódio </a>
                        <a style="margin-bottom: 5px; margin-top: 5px; margin-left: 5px; margin-right: 5px" class="btn btn-danger btn-lg btn-block" href="<?php echo base_url('episodio/gerirEps/' . $temporada->idTemporada); ?>"> Gerir Episódios </a>
                    <?php
                    endforeach
                    ?>
                </div>
            <?php
            endforeach;
        ?>
        <a style="margin-bottom: 5px; margin-top: 5px; margin-left: 5px; margin-right: 5px" class="btn btn-success btn-lg btn-block" href="<?php echo base_url('serie/add') ?>">Adicionar Série</a>
        <a style="margin-bottom: 5px; margin-top: 5px; margin-left: 5px; margin-right: 5px" class="btn btn-success btn-lg btn-block" href="<?php echo base_url('episodio/addEps') ?>">Adicionar Episodio</a>
    </div>


<?php $this->load->view('comuns/footer'); ?>