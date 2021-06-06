<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <img id="seriesBanner" src="<?php echo $query[0]->Banner; ?>" title="Banner">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"

            </div>
            <div class="col-md-3">

            </div>
            <div class="col-md-7 col-sm-7">
                <div id="centered" class="text-center">
                    <h3> <?php echo $query[0]->Titulo; ?></h3>
                    <hr>
                    <p></p>
                </div>
            </div>
        </div>

    </div>


<?php $this->load->view('comuns/footer'); ?>