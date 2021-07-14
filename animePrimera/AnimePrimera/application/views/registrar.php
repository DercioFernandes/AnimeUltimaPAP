    <?php $this->load->view('comuns/header'); ?>
    <?php $this->load->view('comuns/menu'); ?>
    <main xmlns="http://www.w3.org/1999/html">
        <div class="formSerie">
            <h1 class="text-center formTitle">REGISTRAR</h1>
            <form class="formBody action="<?=base_url('register/registrar')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <h6 class="labelEdit text-center">Foto de Perfil: </h6>
                        <?php
                        echo form_upload(array("name" => 'fotoperfil', "id"=>"fotoperfil"),set_value('fotoperfil'),array("class" => "input-file", "required" => "required"));
                        ?>
                </div>
                <div class="form-group">
                    <h6 class="labelEdit text-center">Nome de Utilizador</h6>
                    <input type="text" class="form-control" name="username" placeholder="Nome de Utilizador"/>
                </div>

                <div class="form-group" id="show_hide_password">
                    <h6 class="labelEdit text-center">Password</h6>
                    <input class="form-control" name="password" placeholder="Palavra-passe" type="password"/>
                </div>
                <div class="form-group">
                    <h6 class="labelEdit text-center">Email</h6>
                    <input type="email" class="form-control" name="email" placeholder="Email" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btnSubmitEdit btn-block" type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </main>
    <script src="<?=base_url('resources/js/custom_file/custom_file_input.js')?>"></script>
    <script src="<?=base_url('resources/js/pass.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/all.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/v4-shims.js"></script>

<?php $this->load->view('comuns/footer'); ?>