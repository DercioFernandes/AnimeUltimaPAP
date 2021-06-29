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
                <?php foreach ($comentarios as $comentario): ?>
                    <div class="comentario">
                        <a href="<?php echo base_url('Comentario/reportComment/' . $comentario['idComentarioc']) ?>">
                            <img class="flag" src="<?php echo base_url('./resources/img/Icons/flag.png') ?>"/>
                        </a>
                        <?php
                        if(!empty($idUser)):
                            if($comentario['idUser'] == $idUser):
                                ?>
                                <a href="<?php echo base_url('Comentario/removeComment/' . $comentario['idComentarioc'] )?>">
                                    <img class="flag" src="<?php echo base_url('./resources/img/Icons/remove.png') ?>" alt ="" title="editIcon"/>
                                </a>
                            <?php
                            endif;
                        endif;
                        ?>
                        <div class="comentario-head">
                            <img id="pfp" src="<?php echo base_url('./resources/img/pfp/' . $comentario['FotoPerfil']) ?>">
                            <h6><?php echo $comentario['Username'] ?></h6>
                        </div>
                        <div class="comentario-body">
                            <p><?php echo $comentario['texto'] ?></p>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
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
            </div>
        </div>
    </div>


<?php $this->load->view('comuns/footer'); ?>