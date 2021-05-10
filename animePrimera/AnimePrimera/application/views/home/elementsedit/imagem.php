<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div id="container">
    <h1>Criar Elemento</h1>
</div>
<form action="<?= base_url('homepage/editarImg')?>" method="post" enctype="multipart/form-data">
    <div id="container">
        <h3>Imagem</h3>
        <div class="form-group">
            <label for="ficheiro"> Selecione um File
            <small>(JPG, PNG, GIF, PDF, ZIP, RAR, DOC, XLS)</small>
            <?php
            echo form_upload(array("name" => "ficheiro", "id"=>"ficheiro"),set_value('ficheiro'),array("class" => "input-file"));
            ?>
            </label>
        </div>
        <div class="form-group">
            <label> Manter Imagem
                <input type="checkbox" name="manterImagem" value="1">
            </label>
        </div>
        <h4>Posicionamento</h4>
        <div class="form-group">
            <label> Posicão:
                <input name="posicao" type="number" value="<?php echo $query->posicao ?>">
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
    <input type="hidden" name="src" value="<?php echo $src; ?>">
    <input type="hidden" value="<?php echo $query->id ?>" name="id">
    <div class="form-group">
        <input class="form-control" type="submit" class="btn btn-primary" value="Editar">
    </div>
</form>
<?php $this->load->view('comuns/footer'); ?>