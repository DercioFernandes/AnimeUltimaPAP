<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col seriesinfo">
                <img alt="" class="seriesthumbinfo img-fluid" src="<?php echo base_url('./resources/img/seriesthumb/' . $query[0]['Photo']) ?>" />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3 class="seriestitle"><b><?php echo $query[0]['Titulo']; ?></b></h3>
                <p class="seriesdescription">
                    <?php echo $query[0]['Descricao']; ?>
                    <br/>
                    <b>Tipo:</b>
                    <?php echo $query[0]['Tipo'] ?>
                    <br/>
                    <b>Data de Criação:</b>
                    <?php echo $query[0]['DataRelease'] ?>
                    <br/>
                    <b>Autor:</b>
                    <?php echo $query[0]['Autor'] ?>
                </p>
            </div>
        </div>
        <?php
        $contador = 0;
        foreach($temporadas as $t): ?>
        <div class="row">
            <div class="col">
                <h6 class="tempname">
                    <?php $colapse = 'collapse' . $contador ?>
                    <a class="btn btn-primary" data-toggle="collapse" href="#<?php echo $colapse ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <?php echo $t['Titulo'] ?>
                    </a>
                </h6>
                <div class="collapse" id="<?php echo $colapse ?>">
                        <ul class="templist">
                            <?php
                            for($i = 0 ; $i < $t['nEpisodios']; $i++): ?>
                            <li class="text-center">
                                <a href="<?php echo base_url('/Episodio/watchepisode/' . $episodios[$contador]['idEpisodio']) ?>"><?php echo $episodios[$contador]['titulo'] ?></a>
                                <?php $contador += 1 ?>
                            </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>


<?php $this->load->view('comuns/footer'); ?>