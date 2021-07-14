<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2 class="logtitle text-center">Logs Gerais</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php foreach($tolog as $p): ?>
                <div class="comentario-head">
                    <img id="pfp" src="<?php echo base_url('./resources/img/pfp/' . $p['FotoPerfil']) ?>">
                    <h6><?php echo $p['Username'] ?></h6>
                </div>
                <div class="comentario-body">
                    <?php echo $p['info'] ?>
                </div>>
                <div class="mod-button-group">
                    <a class="editHub text-center" href="<?php echo base_url('logs/manterModLog/' . $p['idModLog']) ?>"> Manter </a>
                    <a class="remHub text-center" href="<?php echo base_url('logs/removerModLog/' . $p['idModLog']) ?>"> Remover </a>
                </div>
            <hr/>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>
