<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

    <div class="container-fluid">
        <?php echo $query[0]->url;
        print_r($query)?>
    </div>
    <iframe class="metaframe rptss" src="<?php echo $query[0]->url; ?>" scrolling="no" allow="autoplay; encrypted-media" allowfullscreen="" frameborder="0"></iframe>
   <iframe class="metaframe rptss" src="https://animesonline.org/gcloud/?id=bktuVTZkVUdoRFFsamhXRmh6RndQR1hnYmxsaVAvLzVIUWx4R0grMWUrR1hEWCt3MkFETHBES2FQbVd2dkNTOA&amp;token=25551" scrolling="no" allow="autoplay; encrypted-media" allowfullscreen="" frameborder="0"></iframe>


<?php $this->load->view('comuns/footer'); ?>