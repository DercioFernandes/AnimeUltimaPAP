<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <?php foreach($tolog as $comentario): ?>
                <div class="comentario-head">
                    <img id="pfp" src="<?php echo base_url('./resources/img/pfp/' . $comentario['FotoPerfil']) ?>">
                    <h6><?php echo $comentario['Username'] ?></h6>
                </div>
                <div class="comentario-body">
                    <p><?php echo $comentario['texto'] ?></p>
                </div>
                <div class="mod-button-group">
                    <a class="editHub text-center" href="<?php echo base_url('logs/manterLogComentarioc/' . $comentario['idComentarioc']) ?>"> Manter </a>
                    <a class="remHub text-center" href="<?php echo base_url('logs/removerLogComentarioc/' . $comentario['idComentarioc']) ?>"> Remover </a>
                </div>
            <hr/>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>
