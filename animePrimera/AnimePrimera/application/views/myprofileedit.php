<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
    <body>

<div class="container-fluid">
    <div class="formSerie">
    <h1 class="text-center formTitle">Editar User</h1>
    <form  class="formBody" action="<?= base_url('user/editUser')?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <h6 class="labelEdit text-center"> Foto de Perfil: </h6>
            <label for="fotoperfil"> Selecione uma Imagem
                <?php
                echo form_upload(array("name" => 'fotoperfil', "id"=>"fotoperfil"),set_value('fotoperfil'),array("class" => "input-file form-control imginput"));
                ?>
            </label>
        </div>
        <div class="form-group">
            Manter Foto de Perfil:
            <input class="text-center" checked type="checkbox" id="manterImagem" name="manterImagem" value="1">
        </div>
        <?php if($perms >= 2): ?>
            <div class="form-group">
                <h6 class="labelEdit text-center"> Banner: </h6>
                <label for="fotoperfil"> Selecione uma Imagem
                    <?php
                    echo form_upload(array("name" => 'banner', "id"=>"banner"),set_value('banner'),array("class" => "input-file form-control imginput"));
                    ?>
                </label>
            </div>
            <div class="form-group">
                Manter Banner:
                <input checked type="checkbox" id="manterBanner" name="manterBanner" value="1">
            </div>
        <?php endif; ?>
        <div class="form-group">
            <h6 class="labelEdit text-center">Username</h6>
            <input class="form-control" id="username" name="username" type="text" value="<?php echo $query['Username']; ?>">
        </div>
        <?php if(isset($isUser)): ?>
            <div class="form-group">
                <h6 class="labelEdit text-center">Email</h6>
                <input class="form-control" id="email" name="email" type="text" value="<?php echo $query['Email']; ?>">
            </div>
            <div class="form-group">
                <h6 class="labelEdit text-center">Password</h6>
                <input class="form-control" id="password" name="password" type="password">
            </div>
        <?php endif; ?>
        <?php if(isset($isAdmin)): ?>
            <div class="form-group">
                <h6 class="labelEdit text-center">Nível de Permissão</h6>
                <select class="form-control" name="permissoes">
                    <option value="0" <?php if($query['Permissoes'] == 0){echo $selected;} ?>>Banido</option>
                    <option value="1" <?php if($query['Permissoes'] == 1){echo $selected;} ?>>Normal</option>
                    <option value="2" <?php if($query['Permissoes'] == 2){echo $selected;} ?>>Premium</option>
                    <option value="3" <?php if($query['Permissoes'] == 3){echo $selected;} ?>>Uploader</option>
                    <option value="4" <?php if($query['Permissoes'] == 4){echo $selected;} ?>>Moderador</option>
                    <option value="5" <?php if($query['Permissoes'] == 5){echo $selected;} ?>>Administrador</option>
                </select>
            </div>
        <?php endif; ?>
        <input type="hidden" name="idUser" value="<?php echo $idUser; ?>">

        <div class="form-group">
            <input class="form-control" type="submit" class="btn btn-primary" name="Editar" value="Editar">
        </div>
    </form>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>