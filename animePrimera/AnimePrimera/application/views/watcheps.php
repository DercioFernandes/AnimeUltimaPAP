<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

    <div class="container-fluid">
        <div id="vbg" class="row justify-content-md-center">
            <div class="col-md-auto">
                <video controls width="auto">
                    <source src="<?php echo base_url($query[0]->url);?>"
                            type="video/mp4">
                    Sorry, your browser doesn't support embedded videos.
                </video>
            </div>
        </div>
        <div class="row">
            <div id="npm" class="col-md-6">
                <h3 id="centered" class="btn-block text-center"> <?php echo $query[0]->titulo; ?> </h3>
                <h4 id="centered" class="btn-block text-center"> Comentários </h4>
            </div>
            <div id="npm" class="col">
                <button id="btnEpsN" type="button" class=" btn btn-dark btn-lg btn-block" > < </button>
            </div>
            <div id="npm" class="col">
                <button id="btnEpsN" type="button" class=" btn btn-dark btn-lg btn-block" > > </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <div id="r" class="card-group">

                </div>
            </div>
    </div>




<?php $this->load->view('comuns/footer'); ?>