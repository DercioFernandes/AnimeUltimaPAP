<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

    <div class="container-fluid">
        <h1>ADD SERIE</h1>
        <form action="<?= base_url('episodio/addEps')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label  for="url"> : </label>
                <input class="form-control" id="url" name="url" type="text" required="required">
            </div>
            <div class="form-group">
                <input class="form-control" type="submit" class="btn btn-primary" name="Criar" value="Criar">
            </div>
        </form>
    </div>


<?php $this->load->view('comuns/footer'); ?>