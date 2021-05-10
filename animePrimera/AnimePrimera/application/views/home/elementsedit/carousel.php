<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div id="container">
    <h1>Criar Elemento</h1>
</div>
<form action="<?= base_url('homepage/criarCarrousel')?>" method="post" enctype="multipart/form-data">
    <div id="container">
        <h3>Imagem 1:</h3>
        <div class="form-group">
            <label for="ficheiro1"> Selecione um File
            <small>(JPG, PNG, GIF, PDF, ZIP, RAR, DOC, XLS)</small>
            <?php
            echo form_upload(array("name" => "ficheiro1", "id"=>"ficheiro12"),set_value('ficheiro1'),array("class" => "input-file", "required" => "required"));
            ?>
            </label>
        </div>

        <h3>Imagem 2:</h3>
        <div class="form-group">
            <label for="ficheiro2"> Selecione um File
                <small>(JPG, PNG, GIF, PDF, ZIP, RAR, DOC, XLS)</small>
                <?php
                echo form_upload(array("name" => "ficheiro2", "id"=>"ficheiro2"),set_value('ficheiro2'),array("class" => "input-file", "required" => "required"));
                ?>
            </label>
        </div>

        <h3>Imagem 3:</h3>
        <div class="form-group">
            <label for="ficheiro3"> Selecione um File
                <small>(JPG, PNG, GIF, PDF, ZIP, RAR, DOC, XLS)</small>
                <?php
                echo form_upload(array("name" => "ficheiro3", "id"=>"ficheiro3"),set_value('ficheiro3'),array("class" => "input-file", "required" => "required"));
                ?>
            </label>
        </div>

        <h3>Imagem 4:</h3>
        <div class="form-group">
            <label for="ficheiro4"> Selecione um File
                <small>(JPG, PNG, GIF, PDF, ZIP, RAR, DOC, XLS)</small>
                <?php
                echo form_upload(array("name" => "ficheiro4", "id"=>"ficheiro4"),set_value('ficheiro4'),array("class" => "input-file", "required" => "required"));
                ?>
            </label>
        </div>

        <h3>Imagem 5:</h3>
        <div class="form-group">
            <label for="ficheiro5"> Selecione um File
                <small>(JPG, PNG, GIF, PDF, ZIP, RAR, DOC, XLS)</small>
                <?php
                echo form_upload(array("name" => "ficheiro5", "id"=>"ficheiro5"),set_value('ficheiro5'),array("class" => "input-file", "required" => "required"));
                ?>
            </label>
        </div>

        <h4>Posicionamento</h4>
        <div class="form-group">
            <label> Posicão:
                <input name="posicao" type="number">
            </label>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" class="label-info" name="perContainer" value="1"> Linha Inteira
            </label>
        </div>
        <div class="form-group">
            <label> Lado onde se Posicionará(caso Linha Inteira não seja escolhida)
                <select name="side">
                    <option value="1">Esquerda</option>
                    <option value="2">Direita</option>
                </select>
            </label>
        </div>
    </div>
    <div class="form-group">
        <input class="form-control" type="submit" class="btn btn-primary" value="Criar">
    </div>
</form>
<?php $this->load->view('comuns/footer'); ?>