<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div id="container">
    <h1>Criar Elemento</h1>
</div>
<form action="<?= base_url('homepage/addElement')?>" method="post" enctype="multipart/form-data">
    <div id="container">
        <div class="form-group">
            <label>Tipo:
            <select name="tipoElemento">
                <option value="0"> Parágrafo </option>
                <option value="1"> Imagem </option>
                <option value="2"> Lista </option>
                <option value="3"> Carta </option>
                <option value="4"> Carrousel </option>
            </select></label>
        </div>
        <div class="form-group">
            <input class="form-control" type="submit" class="btn btn-primary" value="Criar">
        </div>
    </div>
</form>
<?php $this->load->view('comuns/footer'); ?>