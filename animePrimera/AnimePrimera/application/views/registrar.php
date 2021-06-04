    <?php $this->load->view('comuns/header'); ?>
    <?php $this->load->view('comuns/menu'); ?>
    <main xmlns="http://www.w3.org/1999/html">
        <div class="container-fluid pt-5">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-7 col-xl-7">
                    <a href="<?=base_url('')?>">
                        <button type="button" class="btn btn-dark" name="button">Voltar</button>
                    </a>
                    <form action="<?=base_url('register/registrar')?>" method="post" enctype="multipart/form-data">
                        <label for="fotoperfil"> Selecione uma Imagem
                            <?php
                            echo form_upload(array("name" => 'fotoperfil', "id"=>"fotoperfil"),set_value('fotoperfil'),array("class" => "input-file", "required" => "required"));
                            ?>
                        </label>
                        <div class="form-group my-4">
                            <?php echo '<h6 style="color:#138496;">'.form_error('username').'</h6>'; ?>
                            <input type="text" class="form-control" name="username" placeholder="Nome de Utilizador"/>
                        </div>
                        <?php echo '<h6 style="color:#138496;">'.form_error('password').'</h6>'; ?>
                        <div class="input-group my-4" id="show_hide_password">
                            <input class="form-control" name="password" placeholder="Palavra-passe" type="password"/>
                            <div class="input-group-append">
						      		<span class="input-group-text">
							        	<a style="color: black;" href="">
							        		<i id="passe" class="fas fa-eye-slash" aria-hidden="true"></i>
							        	</a>
						        	</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email" >
                        </div>
                        <div class="row my-5">
                            <div class="col">
                                <button class="btn btn-primary btn-block" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="<?=base_url('resources/js/custom_file/custom_file_input.js')?>"></script>
    <script src="<?=base_url('resources/js/pass.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/all.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/v4-shims.js"></script>

<?php $this->load->view('comuns/footer'); ?>