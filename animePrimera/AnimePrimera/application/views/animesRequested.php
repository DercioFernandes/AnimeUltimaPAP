<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <?php foreach($solicitacoes as $p): ?>
                <div class="comentario-head">
                    <img id="pfp" src="<?php echo base_url('./resources/img/pfp/' . $p['FotoPerfil']) ?>">
                    <h6><?php echo $p['Username'] ?></h6>
                </div>
                <div class="comentario-body">
                    <?php echo $p['info'] ?>
                </div>>
                <div class="mod-button-group">
                    <a class="editHub text-center" href="<?php echo base_url('RequestAnime/addToDoList/' . $p['idRequest']) ?>"> Completo </a>
                    <a class="remHub text-center" href="<?php echo base_url('RequestAnime/removerRequest/' . $p['idRequest']) ?>"> Remover </a>
                </div>
            <hr/>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>
