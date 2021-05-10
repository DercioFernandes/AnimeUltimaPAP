<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div id="container">
    <h1>Criar Elemento</h1>
</div>
<form action="<?= base_url('homepage/criarImg')?>" method="post" enctype="multipart/form-data">
    <div id="container">
        <h3>Imagem</h3>
        <div class="form-group">
            <label for="ficheiro"> Selecione um File
            <small>(JPG, PNG, GIF, PDF, ZIP, RAR, DOC, XLS)</small>
            <?php
            echo form_upload(array("name" => "ficheiro", "id"=>"ficheiro"),set_value('ficheiro'),array("class" => "input-file", "required" => "required"));
            ?>
            </label>
        </div>
        <div class="form-group">
            <label> Configurar Manualmente
                <input type="checkbox" value="1" name="manualconfig">
                <div class="form-group">
                    <label> Altura:
                        <input type="number" name="altura">
                    </label>
                </div>
                <div class="form-group">
                    <label> Comprimento:
                        <input type="number" name="comprimento">
                    </label>
                </div>
            </label>
        </div>
        <div class="form-group">
            <label> Configurar Automaticamente
                <input type="checkbox" value="1" name="autoconfig">
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