<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
    <body>

<div class="container-fluid">
    <div class="formSerie">
        <h1 class="text-center formTitle">EDITAR EPISÓDIO</h1>
        <form class="formBody" action="<?= base_url('episodio/gerirEps')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" id="titulo" name="titulo" placeholder="Título" type="text" required="required" value="<?php echo $query[0]->titulo; ?>">
            </div>
            <div class="form-group">
                <input class="form-control" id="dataRelease" name="dataRelease" placeholder="Data de Início" type="text" required="required" value="<?php echo $query[0]->dataRelease; ?>">
            </div>

            <input type="hidden" name="idEpisodio" value="<?php echo $idEpisodio; ?>">

            <div class="form-group">
                <input class="form-control" type="submit" class="btnSubmitEdit btn-block" name="Editar" value="Editar">
            </div>
        </form>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>