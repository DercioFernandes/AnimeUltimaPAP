<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
    <body>

<div class="container-fluid">
    <div class="formSerie">
        <h1 class="text-center formTitle">EDITAR TEMPORADA</h1>
        <form class="formBody" action="<?= base_url('temporada/editarTemp')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <h6 class="labelEdit text-center">Título</h6>
                <input class="form-control" id="titulo" name="titulo" placeholder="Título" type="text" required="required" value="<?php echo $temporada[0]['Titulo'] ?>"/>
            </div>
            <div class="form-group">
                <h6 class="labelEdit text-center">Data de Lançamento</h6>
                <input class="form-control" id="dataRelease" name="dataRelease" placeholder="Data de Lançamento" type="text" required="required" value="<?php echo $temporada[0]['DataRelease'] ?>"/>
            </div>
            <div class="form-group">
                <h6 class="labelEdit text-center">Thumbnail</h6>
                <input class="form-control text-center" id="thumbnail" name="thumbnail" placeholder="Thumbnail" type="file"/>
            </div>

            <input type="hidden" name="idSerie" value="<?php echo $idSerie; ?>">
            <input type="hidden" name="idTemporada" value="<?php echo $idTemporada; ?>">

            <div class="form-group">
                <input type="submit" class="btnSubmitEdit btn-block" name="Editar" value="Editar">
            </div>
        </form>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>