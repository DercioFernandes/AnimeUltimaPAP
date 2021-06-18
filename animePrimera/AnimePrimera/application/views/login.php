<?php $this->load->view('comuns/header'); ?>
    <?php $this->load->view('comuns/menu'); ?>
    
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <h1>Login</h1>
            <?php if(isset($form_error)): ?>
                <p>{form_error}</p>
            <?php endif; ?>
            <form action="<?=base_url('login/login')?>" method="post" enctype="multipart/form-data">
                <div class="form-group my-4">
                    <?php echo '<h6 style="color:#138496;">' .form_error('username').'</h6>'; ?>
                    <input type="text" class="form-control" name="username" placeholder="Nome de Utilizador" value="<?=set_value('username')?>" />
                </div>
                <?php echo '<h6 style="color:#138496;">' .form_error('password').'</h6>'; ?>
                <div class="input-group my-4" id="show_hide_password">
                    <input class="form-control" name="password" placeholder="Palavra-passe" type="password" value="<?=set_value('password')?>" />
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <a style="color: black;" href="">
                                <i id="passe" class="fas fa-eye-slash" aria-hidden="true"></i>
                            </a>
                        </span>
                    </div>
                </div>
                <div>
                    <input type="submit" name="login_submit" value="Login" />
                </div>
            </form>
            <?php if($msg = $this->session->flashdata('message')): ?>
                <div class="row">
                    <div class="col">
                        <div>
                            <h4 class="text-danger"><?php echo $msg;?></h4>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <form action="<?=base_url('login/login')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Nome de Utilizador" value="username"/>
                    </div>

                    <div class="form-group my-4">
                        <?php echo '<h6 style="color:#138496;">' .form_error('username').'</h6>'; ?>
                        <input type="text" class="form-control" name="username" placeholder="Nome de Utilizador" value="<?=set_value('username')?>" />
                    </div>
                    <?php echo '<h6 style="color:#138496;">' .form_error('password').'</h6>'; ?>
                    <div class="input-group my-4" id="show_hide_password">
                        <input class="form-control" name="password" placeholder="Palavra-passe" type="password" value="<?=set_value('password')?>" />
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <a style="color: black;" href="">
                                <i id="passe" class="fas fa-eye-slash" aria-hidden="true"></i>
                            </a>
                        </span>
                        </div>
                    </div>
                    <div>
                        <input type="submit" name="login_submit" value="Login" />
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('comuns/footer'); ?>