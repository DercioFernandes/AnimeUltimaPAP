<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
    <body>

<div class="container-fluid">
    <div class="formSerie">
        <h1 class="text-center formTitle">ADICIONAR EPISÓDIO</h1>
        <form class="formBody" action="<?= base_url('episodio/addEps')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <h6 class="labelEdit text-center">Ficheiro</h6>
                <input name="video_name" id="video_name" readonly="readonly" type="file" />
                <h6 class="labelEdit text-center">Nº de Episódio</h6>
                <input type="hidden" name="video_upload" value="Upload Video"/>
            </div>

            <div class="form-group">
                <input class="form-control" id="animeEps" name="animeEps" placeholder="Anime Episode" type="number" required="required">
            </div>

            <input type="hidden" name="idTemporada" value="<?php echo $idTemporada; ?>">

            <div class="form-group">
                <input class="form-control" type="submit" class="btn btn-primary" name="Criar" value="Criar">
            </div>
        </form>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>