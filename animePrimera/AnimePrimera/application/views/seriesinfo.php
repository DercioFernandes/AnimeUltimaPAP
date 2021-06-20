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
        <div class="row">
            <div class="col ">
                <button class="seguir btn-block text-center" data-toggle="modal" data-target="#rate"> + Rate </button>
            </div>
            <div class="col">
                <a class="seguir btn-block text-center" href="#"> + Seguir </a>
            </div>
            <div class="col">
                <a class="seguir btn-block text-center" href="#"> + Favoritos </a>
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
                                <a class="btn-block text-center" href="<?php echo base_url('/Episodio/watchepisode/' . $episodios[$contador]['idEpisodio']) ?>"><?php echo $episodios[$contador]['titulo'] ?></a>
                                <?php $contador += 1 ?>
                            </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="rate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>Rate</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('serie/rate/' . $idSerie)?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idUser" value="<?php if(isset($idUser)){ echo $idUser; } ?>">
                        <select class="btn-block text-center" name="rate">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <input class=" seguir btn-block" type="submit" class="btn btn-primary" name="ratesubmited" value="Submeter">
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php $this->load->view('comuns/footer'); ?>