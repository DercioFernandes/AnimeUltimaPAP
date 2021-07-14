<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>

    <div class="container-fluid">
        <div id="vbg" class="row justify-content-md-center">
            <div class="col-md-auto">
            <?php if(!empty($query[0]['video']) && !empty($query[0]['img'])): ?>
                <video id="video" controls width="auto">
                    <source src="<?php echo base_url($query[0]['video']);?>"
                            type="video/mp4">
                    Sorry, your browser doesn't support embedded videos.
                </video>
            </div>
            <div class="col-md-auto">
                <img class="imgPost" src="<?php echo base_url('resources/img/compost/'.$query[0]['img']) ?>" alt="Img do Post">
            </div>
            <?php elseif(!empty($query[0]['video'])): ?>
                <video id="video" controls width="auto">
                    <source src="<?php echo base_url($query[0]['video']);?>"
                            type="video/mp4">
                    Sorry, your browser doesn't support embedded videos.
                </video>
            </div>
            <?php elseif(!empty($query[0]['img'])): ?>
                <img class="imgPost" src="<?php echo base_url('resources/img/compost/'.$query[0]['img']) ?>" alt="Img do Post">
            </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div id="npm" class="col">
                <h3 id="centered" class="btn-block text-center"> <?php echo $query[0]['titulo']; ?> </h3>
            </div>
        </div>
        <div class="row">
            <div id="npm" class="col">
                <h4 id="centered" class="btn-block text-center"> Comentários </h4>
                <form action="<?= base_url('Comentario/addCommentC')?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idUser" value="<?php if(isset($idUser)){ echo $idUser; } ?>">
                    <input type="hidden" name="idCompost" value="<?php echo $idCompost; ?>">
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
                                <a href="<?php echo base_url('Comentario/reportCommentC/' . $comentario['idComentarioc'] . '/' . $idCompost) ?>">
                                    <img class="flag" src="<?php echo base_url('./resources/img/Icons/flag.png') ?>"/>
                                </a>
                                <?php
                                if(!empty($idUser)):
                                    if($comentario['idUser'] == $idUser):
                                        ?>
                                        <a href="<?php echo base_url('Comentario/removeCommentC/' . $comentario['idComentarioc'] )?>">
                                            <img class="flag" src="<?php echo base_url('./resources/img/Icons/remove.png') ?>" alt ="" title="editIcon"/>
                                        </a>
                                    <?php
                                    endif;
                                endif;
                                $q2 = $this->main_model->get_both_main_whereV2('comentariocompost','user','comentariocompost.idUser = user.idUser','comentariocompost.idComentarioc =',$comentario['idCC']);
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
                                    <form action="<?= base_url('Comentario/addCommentC')?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="idUser" value="<?php if(isset($idUser)){ echo $idUser; } ?>">
                                        <input type="hidden" name="idCompost" value="<?php echo $idCompost; ?>">
                                        <input type="hidden" name="commentComment" value="<?php echo $comentario['idComentarioc'] ?>">
                                        <textarea class="comentariocomment" name="coment" placeholder="Responder"></textarea>
                                        <div class="form-group">
                                            <input class="form-control btn commentcommentbtn" type="submit" name="Submeter" value="Responder">
                                        </div>
                                    </form>


                                </div>
                            </div>
                            <hr>
                        <?php endif;
                    endforeach; ?>
            </div>
            <div id="npm" class="col">
                <div class="postbody">
                    Gostos: <?php echo $gostos ?>
                    <hr>
                    <?php echo $query[0]['descricao'] ?>
                </div>
                <div class="postfooter">
                    <h6 class="authorname text-center">
                        <?php echo $username ?>
                        <img class="pfpauthor" src="<?php echo base_url('./resources/img/pfp/' . $pfp) ?>" title="fotoDePerfil"  />
                    </h6>
                </div>
                <?php if(!empty($ratingC)): ?>
                    <a class="<?php echo $ratingC;?> btn-block text-center" href="<?php echo base_url('hub/likePost/'.$idCompost) ?>"> Downvote </a>
                <?php else: ?>
                    <a class="seguir btn-block text-center" href="<?php echo base_url('hub/likePost/'.$idCompost) ?>"> Upvote </a>
                <?php endif; ?>
                <?php
                if(!empty($user)):
                    ?>
                    <?php if($perms == 3 || $perms == 4 || $perms == 5): ?>
                        <?php if($idAuthor == $idUser): ?>
                            <a class="editHub text-center" href="<?php echo base_url('hub/editarPost/' . $idCompost); ?>">Editar</a>
                        <?php endif; ?>
                    <a class="remHub text-center" href="<?php echo base_url('hub/removerPost/' . $idCompost); ?>">Remover</a>
                <?php endif; ?>
                <?php
                endif;
                ?>
                <div class="col">

                </div>
        </div>
    </div>


<?php $this->load->view('comuns/footer'); ?>