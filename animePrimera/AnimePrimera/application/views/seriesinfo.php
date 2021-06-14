<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>

    <div class="seriesheader">
            <img alt="" class="seriesthumbinfo" src="<?php echo base_url('./resources/img/seriesthumb/' . $query[0]['Photo']) ?>" />
            <h3 class="seriestitle"><?php echo $query[0]['Titulo']; ?></h3>
            <p class="seriesdescription"><?php echo $query[0]['Descricao']; ?></p>
        </div>
    </div>


<?php $this->load->view('comuns/footer'); ?>