<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <?php foreach($tolog as $p): ?>
                <div class="col-sm-4 md-4 lg-4">
                    <a class="smallPost" href="<?php echo base_url('hub/hubinfo/' . $p['idCompost']) ?>">
                        <div class="smallPost">
                            <div class="smallPostHeader">
                                <?php echo $p['titulo'] ?>
                            </div>
                            <div class="smallPostBody">
                                <?php if(!empty($p['video'])): ?>
                                    <video class="videoHub" id="video" controls width="auto">
                                        <source src="<?php echo base_url($p['video']);?>"
                                                type="video/mp4">
                                        Sorry, your browser doesn't support embedded videos.
                                    </video>
                                <?php elseif(!empty($p['img'])): ?>
                                    <img class="compostimg" src="<?php echo base_url('resources/img/compost/' . $p['img']) ?>"/>
                                <?php endif; ?>
                            </div>
                            <div class="smallPostFooter">
                                Autor: <small>
                                    <?php
                                    $queryautor = $this->main_model->get_main_where_array('user','idUser',$p['idUser']);
                                    echo $queryautor[0]['Username'] ?>
                                </small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mod-button-group">
                    <a class="editHub text-center" href="<?php echo base_url('logs/manterLogCompost/' . $p['idCompost']) ?>"> Manter </a>
                    <a class="remHub text-center" href="<?php echo base_url('logs/removerLogCompost/' . $p['idCompost']) ?>"> Remover </a>
                </div>
            <hr/>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>
