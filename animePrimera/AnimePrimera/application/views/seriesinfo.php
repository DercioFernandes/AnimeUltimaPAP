<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col seriesinfo">
                <img alt="" class="seriesthumbinfo img-fluid" src="<?php echo base_url('./resources/img/seriesthumb/' . $query[0]['Photo']) ?>" />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3 class="seriestitle"><b><?php echo $query[0]['Titulo']; ?></b></h3>
                <p class="seriesdescription">
                    <?php echo $query[0]['Descricao']; ?>
                    <br/>
                    <b>Tipo:</b>
                    <?php echo $query[0]['Tipo'] ?>
                    <br/>
                    <b>Data de Criação:</b>
                    <?php echo $query[0]['DataRelease'] ?>
                    <br/>
                    <b>Autor:</b>
                    <?php echo $query[0]['Autor'] ?>
                </p>
            </div>
        </div>
        <?php foreach($query as $serie): ?>
        <div class="row">
            <div class="col">
                <select class="temporadadp">
                    <option class="episodiodp" value="<?php echo $serie[''] ?>">Volvo</option>
                </select>
            </div>
        </div>
        <?php endforeach; ?>
    </div>


<?php $this->load->view('comuns/footer'); ?>