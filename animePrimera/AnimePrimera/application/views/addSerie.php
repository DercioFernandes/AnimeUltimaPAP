<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
    <body>

<div class="container-fluid">
    <h1>ADD SERIE</h1>
    <form action="<?= base_url('serie/add')?>" method="post" enctype="multipart/form-data">
        <label for="thumbnail"> Selecione uma Imagem
            <?php
            echo form_upload(array("name" => 'thumbnail', "id"=>"thumbnail"),set_value('thumbnail'),array("class" => "input-file", "required" => "required"));
            ?>
        </label>
        <div class="form-group">
            <input class="form-control" id="titulo" name="titulo" placeholder="Título" type="text" required="required">
        </div>

        <div class="form-group">
            <input class="form-control" id="autor" name="autor" placeholder="Autor" type="text" required="required">
        </div>

        <div class="form-group">
            <input class="form-control" id="descricao" name="descricao" placeholder="Descrição" type="text" required="required">
        </div>

        <div class="form-group">
            <input class="form-control" id="tipo" name="tipo" placeholder="Tipo" type="text" required="required">
        </div>

        <div class="form-group">
            <input class="form-control" type="submit" class="btn btn-primary" name="Criar" value="Criar">
        </div>
    </form>
</div>


<?php $this->load->view('comuns/footer'); ?>