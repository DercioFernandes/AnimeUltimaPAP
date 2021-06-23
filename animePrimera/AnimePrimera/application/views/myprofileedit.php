<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
    <body>

<div class="container-fluid">
    <h1>Editar User</h1>
    <form action="<?= base_url('user/editUser')?>" method="post" enctype="multipart/form-data">
        <label for="fotoperfil"> Selecione uma Imagem
            <?php
            echo form_upload(array("name" => 'fotoperfil', "id"=>"fotoperfil"),set_value('fotoperfil'),array("class" => "input-file"));
            ?>
        </label>
        <label for="manterImagem">
            Manter Imagem
            <input checked type="checkbox" id="manterImagem" name="manterImagem" value="1">
        </label>
        <div class="form-group">
            <input class="form-control" id="username" name="username" type="text" value="<?php echo $query['Username']; ?>">
        </div>
        <div class="form-group">
            <input class="form-control" id="email" name="email" type="text" value="<?php echo $query['Email']; ?>">
        </div>
        <div class="form-group">
            <input class="form-control" id="password" name="password" type="password">
        </div>

        <input type="hidden" name="idUser" value="<?php echo $idUser; ?>">

        <div class="form-group">
            <input class="form-control" type="submit" class="btn btn-primary" name="Editar" value="Editar">
        </div>
    </form>
</div>


<?php $this->load->view('comuns/footer'); ?>