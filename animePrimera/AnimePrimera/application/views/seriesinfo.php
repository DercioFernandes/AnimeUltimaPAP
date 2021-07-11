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
                <?php
                    if(!empty($user)):
                ?>
                        <?php if($perms == 3 || $perms == 4 || $perms == 5): ?>
                            <a class="editTemp" href="<?php echo base_url('serie/editar/' . $idSerie); ?>">Editar</a>
                            <a class="remTemp" href="<?php echo base_url('serie/remover/' . $idSerie); ?>">Remover</a>
                        <?php endif; ?>
                <?php
                    endif;
                ?>
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
                    <br/>
                    <b>Favoritos:</b>
                    <?php echo $qFav; ?>
                    <br/>
                    <b>Rating:</b>
                    <?php echo $query[0]['rating'] ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col ">
                <button class="<?php if(!empty($ratingC)){ echo $ratingC; }else{ echo 'seguir'; } ?> btn-block text-center" data-toggle="modal" data-target="#rate"> + Rate </button>
            </div>
            <div class="col">
                <a class="<?php if(!empty($seguirC)){ echo $seguirC; }else{ echo 'seguir'; } ?> btn-block text-center" href="<?php echo base_url('Serie/seguir/' . $idSerie) ?>"> + Seguir </a>
            </div>
            <div class="col">
                <a class="<?php if(!empty($vendoC)){ echo $vendoC; }else{ echo 'seguir'; } ?> btn-block text-center" href="<?php echo base_url('Serie/vendo/' . $idSerie) ?>"> + Assistindo </a>
            </div>
            <div class="col">
                <a class="<?php if(!empty($droppedC)){ echo $droppedC; }else{ echo 'seguir'; } ?> btn-block text-center" href="<?php echo base_url('Serie/dropped/' . $idSerie) ?>"> + Parado </a>
            </div>
            <div class="col">
                <a class="<?php if(!empty($porverC)){ echo $porverC; }else{ echo 'seguir'; } ?> btn-block text-center" href="<?php echo base_url('Serie/completo/' . $idSerie) ?>"> + Completo </a>
            </div>
            <div class="col">
                <a class="<?php if(!empty($favoritoC)){ echo $favoritoC; }else{ echo 'seguir'; } ?> btn-block text-center" href="<?php echo base_url('Serie/favorito/' . $idSerie) ?>"> + Favoritos </a>
            </div>
        </div>
        <?php
        if(!empty($user)):
            ?>
            <?php if($perms == 3 || $perms = 4 || $perms = 5): ?>
                <a class="addTemp" href="<?php echo base_url('temporada/addTemp/' . $idSerie); ?>">Adicionar Temporada</a>
            <?php endif; ?>
        <?php endif; ?>
        <?php
        $contador = 0;
        foreach($temporadas as $t): ?>
        <div class="row">
            <div class="col">
                <h6 class="tempname">
                    <?php $colapse = 'collapse' . $contador ?>

                    <?php
                    if(!empty($user)):
                        ?>
                        <?php if($perms == 3 || $perms == 4 || $perms == 5): ?>
                            <a class="editTemp" href="<?php echo base_url('temporada/editarTemp/'.$idSerie.'/'.$t['idTemporada']) ?>">Editar</a>
                            <a class="gerirTemp" href="<?php echo base_url('episodio/gerirEps/' . $t['idTemporada']); ?>">Gerir Episódios</a>
                            <a class="remTemp" href="<?php echo base_url('temporada/remover/' . $t['idTemporada']); ?>">Remover</a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <a class="btn" data-toggle="collapse" href="#<?php echo $colapse ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
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
                            <?php
                            if(!empty($user)):
                                ?>
                                <?php if($perms == 3 || $perms == 4 || $perms == 5): ?>
                                    <li class="text-center">
                                        <a class="btn-block text-center" href="<?php echo base_url('episodio/addEps/' . $t['idTemporada']); ?>"> Adicionar Episódio </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php
        if(!empty($user)):
            if($perms == 3 || $perms == 4 || $perms == 5): ?>
        <div class="col ">
            <button class="<?php if(!empty($ratingC)){ echo $ratingC; }else{ echo 'seguir'; } ?> btn-block text-center" data-toggle="modal" data-target="#calendario"> Adicionar ao Calendário </button>
        </div>
        <?php
            endif;
        endif;?>
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

    <div class="modal fade" id="calendario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>Adiconar ao Calendário</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Dia da Semana: </p>
                    <form action="<?php echo base_url('Calendario/addCalendario/' . $idSerie)?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idUser" value="<?php if(isset($idUser)){ echo $idUser; } ?>">
                        <select class="btn-block text-center" name="dataDaSemana">
                            <option value="0">Domingo</option>
                            <option value="1">Segunda-Feira</option>
                            <option value="2">Terça-Feira</option>
                            <option value="3">Quarta-Feira</option>
                            <option value="4">Quinta-Feira</option>
                            <option value="5">Sexta-Feira</option>
                            <option value="6">Sabado</option>
                        </select>
                        <input class=" seguir btn-block" type="submit" class="btn btn-primary" name="submitcalendar" value="Submeter">
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php $this->load->view('comuns/footer'); ?>