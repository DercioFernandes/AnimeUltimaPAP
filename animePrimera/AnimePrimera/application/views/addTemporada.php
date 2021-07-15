<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
    <body>

<div class="container-fluid">
    <div class="formSerie">
        <h1 class="text-center formTitle">ADICIONAR TEMPORADA</h1>
        <form action="<?= base_url('temporada/addTemp')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <h6 class="labelEdit text-center">Capa</h6>
                <label for="thumbnail"> Selecione uma Imagem
                    <?php
                    echo form_upload(array("name" => 'thumbnail', "id"=>"thumbnail"),set_value('thumbnail'),array("class" => "input-file form-control", "required" => "required"));
                    ?>
                </label>
            </div>
            <input type="hidden" name="idSerie" value="<?php echo $idSerie; ?>">
            <div class="form-group">
                <h6 class="labelEdit text-center">Titulo: </h6>
                <input class="form-control" type="text" name="tempTitle" placeholder="Titulo">
            </div>
            <div class="form-group">
                <input class="form-control" type="submit" class="btn btn-primary" name="Criar" value="Criar">
            </div>
        </form>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>