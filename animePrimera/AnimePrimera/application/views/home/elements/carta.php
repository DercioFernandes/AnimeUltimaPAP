<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
    <body>

<div id="container">
    <h1>Criar Elemento</h1>
</div>
<form action="<?= base_url('homepage/criarCarta')?>" method="post" enctype="multipart/form-data">
    <div id="container">

        <h4>Carta</h4>
        <div class="form-group">
            <label for="ficheiro"> Selecione um Icon/Imagem
                <small>(JPG, PNG, GIF, PDF, ZIP, RAR, DOC, XLS)</small>
                <?php
                echo form_upload(array("name" => "ficheiro", "id"=>"ficheiro"),set_value('ficheiro'),array("class" => "input-file", "required" => "required"));
                ?>
            </label>
        </div>

        <div class="form-group">
            <label>Título:
                <input name="titulo" type="text">
            </label>
        </div>

        <div class="form-group">
            <label>Conteudo:
                <input name="conteudo" type="text">
            </label>
        </div>

        <h4>Posicionamento</h4>
        <div class="form-group">
            <label> Posicão:
                <input name="posicao" type="number">
            </label>
        </div>

        <div class="form-group">
            <input class="form-control" type="submit" class="btn btn-primary" value="Criar">
        </div>
    </div>
</form>
<?php $this->load->view('comuns/footer'); ?>