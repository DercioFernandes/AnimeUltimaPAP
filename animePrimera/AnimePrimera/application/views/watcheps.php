<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

    <div class="container-fluid">
        <div id="vbg" class="row justify-content-md-center">
            <div class="col-md-auto">
                <video id="video" controls width="auto">
                    <source src="<?php echo base_url($query[0]->url);?>"
                            type="video/mp4">
                    Sorry, your browser doesn't support embedded videos.
                </video>
            </div>
        </div>
        <div class="row">
            <div id="npm" class="col">
                <h3 id="centered" class="btn-block text-center"> <?php echo $query[0]->titulo; ?> </h3>
            </div>
        </div>
        <div class="row">
            <div id="npm" class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                <h4 id="centered" class="btn-block text-center"> Comentários </h4>
            </div>
            <div id="npm" class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                <a href="<?php echo base_url('Episodio/epsAnterior/'.$idEpisodio) ?>" id="btnEpsN" > Anterior </a>
            </div>
            <div id="npm" class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                <a href="<?php echo base_url('Episodio/epsProximo/'.$idEpisodio) ?>" id="btnEpsN" > Próximo </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 coment">
                <form action="<?= base_url('Comentario/addComment')?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idUser" value="<?php if(isset($idUser)){ echo $idUser; } ?>">
                    <input type="hidden" name="idEpisodio" value="<?php echo $idEpisodio; ?>">
                    <textarea class="comentario" name="coment" placeholder="Deixa o teu comentário aqui!"></textarea>
                    <div class="form-group">
                        <input class="form-control" type="submit" class="btn btn-primary" name="Submeter" value="Submeter">
                    </div>
                </form>
                <?php foreach ($comentarios as $comentario):
                    if($comentario['isAnswer'] == 1):
                    ?>
                    <?php
                    else:
                    ?>
                    <div class="comentario">
                        <a href="<?php echo base_url('Comentario/reportComment/' . $comentario['idComentario'] . '/' . $idEpisodio) ?>">
                            <img class="flag" src="<?php echo base_url('./resources/img/Icons/flag.png') ?>"/>
                        </a>
                        <?php
                            if(!empty($idUser)):
                                if($comentario['idUser'] == $idUser || $perms >= 4):
                        ?>
                                <a href="<?php echo base_url('Comentario/removeComment/' . $comentario['idComentario'] )?>">
                                    <img class="flag" src="<?php echo base_url('./resources/img/Icons/remove.png') ?>" alt ="" title="editIcon"/>
                                </a>
                        <?php
                                endif;
                            endif;
                            $q2 = $this->main_model->get_both_main_whereV2('comentario','user','comentario.idUser = user.idUser','comentario.idComentario =',$comentario['idCC']);
                            if(!empty($q2)):
                        ?>
                            <div class="comentario-head">
                                <a href="<?php echo base_url('User/viewProfile/'.$comentario['idUser'])?>">
                                    <img id="pfp" src="<?php echo base_url('./resources/img/pfp/' . $comentario['FotoPerfil']) ?>">
                                </a>
                                <h6><?php echo $comentario['Username'] ?></h6>
                                <p class="commentofcomment comentario-text">Respondendo a: @<?php echo $q2[0]['Username'] ?> - <?php echo $q2[0]['texto'] ?></p>
                            </div>
                        <?php else: ?>
                            <div class="comentario-head">
                                <a href="<?php echo base_url('User/viewProfile/'.$comentario['idUser'])?>">
                                    <img id="pfp" src="<?php echo base_url('./resources/img/pfp/' . $comentario['FotoPerfil']) ?>">
                                </a>
                                <h6><?php echo $comentario['Username'] ?></h6>
                            </div>
                        <?php endif; ?>
                        <div class="comentario-body">
                            <p class="comentario-text"><?php echo $comentario['texto'] ?></p>
                            <form action="<?= base_url('Comentario/addComment')?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="idUser" value="<?php if(isset($idUser)){ echo $idUser; } ?>">
                                <input type="hidden" name="idEpisodio" value="<?php echo $idEpisodio; ?>">
                                <input type="hidden" name="commentComment" value="<?php echo $comentario['idComentario'] ?>">
                                <textarea class="comentariocomment" name="coment" placeholder="Responder"></textarea>
                                <div class="form-group">
                                    <input class="form-control btn commentcommentbtn" type="submit" name="Submeter" value="Responder">
                                </div>
                            </form>


                        </div>
                        <?php
                            $q2 = $this->main_model->get_main_where_array('comentario','idCC',$comentario['idComentario']);
                        ?>
                    </div>
                    <hr>
                <?php endif;
                endforeach; ?>
            </div>
            <div id="npm" class="col-md-6">
                <div id="r" class="card-group">
                    <?php foreach ($recommended as $serie): ?>
                        <a href="<?php echo base_url('/serie/seriesinfo/' . $serie[0]->idSerie) ?>">
                            <div class="card text-white mb-3">
                                <img id="image" class="card-img-top" src="<?php echo base_url('/resources/img/seriesthumb/' . $serie[0]->Photo) ?>" alt="Thumbnail">
                                <div id="middle" class="card-body">
                                    <h5 id="text" class="card-title"><?php echo $serie[0]->Titulo ?></h5>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
    </div>




<?php $this->load->view('comuns/footer'); ?>