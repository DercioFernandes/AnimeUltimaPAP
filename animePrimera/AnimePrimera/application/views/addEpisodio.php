<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
    <body>

<div class="container-fluid">
    <h1>ADD EPISODIO</h1>
    <form action="<?= base_url('episodio/addEps')?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input class="form-control" id="animeName" name="animeName" placeholder="Anime Name" type="text" required="required">
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


<?php $this->load->view('comuns/footer'); ?>