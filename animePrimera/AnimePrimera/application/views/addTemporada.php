<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
    <body>

<div class="container-fluid">
    <h1>ADD TEMPORADA</h1>
    <form action="<?= base_url('temporada/addTemp')?>" method="post" enctype="multipart/form-data">
        <label for="thumbnail"> Selecione uma Imagem
            <?php
            echo form_upload(array("name" => 'thumbnail', "id"=>"thumbnail"),set_value('thumbnail'),array("class" => "input-file", "required" => "required"));
            ?>
        </label>
        <input type="hidden" name="idSerie" value="<?php echo $idSerie; ?>">
        <div class="form-group">
            <input class="form-control" type="submit" class="btn btn-primary" name="Criar" value="Criar">
        </div>
    </form>
</div>


<?php $this->load->view('comuns/footer'); ?>