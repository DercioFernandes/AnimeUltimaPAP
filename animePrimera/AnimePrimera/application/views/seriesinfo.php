<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

    <div class="container-fluid">
        <div id="centered" class="text-center">
            <h3> <?php echo $query[0]->Titulo; ?></h3>
        </div>
        <iframe class="metaframe rptss" src="<?php echo $query[0]->url; ?>" scrolling="no" allow="autoplay; encrypted-media" allowfullscreen="" frameborder="0"></iframe>
    </div>
    <iframe class="metaframe rptss" src="https://animesonline.org/gcloud/?id=VXQzVTdaMkNFU2REdUkxNDVxaFlxRC85RW5lSVExSXB2UkhncWVsSXBvMnVSeXNUU2xCZkExaTVWZlI5WndTaw&amp;token=24984" scrolling="no" allow="autoplay; encrypted-media" allowfullscreen="" frameborder="0"></iframe>



<?php $this->load->view('comuns/footer'); ?>