<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
    <body>

<div class="container-fluid">
    <div class="formSerie">
        <h1 class="text-center formTitle">CRIAR SÉRIE</h1>
        <form action="<?= base_url('serie/add')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <h6 class="labelEdit text-center">Capa</h6>
                <?php
                echo form_upload(array("name" => 'thumbnail', "id"=>"thumbnail"),set_value('thumbnail'),array("class" => "input-file", "required" => "required"));
                ?>
            </div>>
            <div class="form-group">
                <h6 class="labelEdit text-center">Titulo</h6>
                <input class="form-control" id="titulo" name="titulo" placeholder="Título" type="text" required="required">
            </div>

            <div class="form-group">
                <h6 class="labelEdit text-center">Capa</h6>
                <input class="form-control" id="autor" name="autor" placeholder="Autor" type="text" required="required">
            </div>

            <div class="form-group">
                <h6 class="labelEdit text-center">Descrição</h6>
                <input class="form-control" id="descricao" name="descricao" placeholder="Descrição" type="text" required="required">
            </div>

            <div class="form-group">
                <h6 class="labelEdit text-center">Tipo</h6>
                <input class="form-control" id="tipo" name="tipo" placeholder="Tipo" type="text" required="required">
            </div>

            <div class="form-group">
                <input class="btnSubmitEdit btn-block" type="submit" class="btn btn-primary" name="Criar" value="Criar">
            </div>
        </form>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>