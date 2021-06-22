<?php $this->load->view('comuns/header'); ?>
    <?php $this->load->view('comuns/menu'); ?>

    <div class="container-fluid backgroundBodied">
        <div class="row">
            <div class="col logindiv">
                <h2 class="logintitle text-center">Login</h2>
                <form action="<?=base_url('login/login')?>" method="post" enctype="multipart/form-data">
                    <input type="text" class="loginuser text-center" name="username" placeholder="Nome de Utilizador" />
                    <input class="loginuser text-center" name="password" placeholder="Palavra-passe" type="password" />
                    <input class="loginbutton" type="submit" name="login_submit" value="Login" />
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('comuns/footer'); ?>