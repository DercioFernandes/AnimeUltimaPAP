<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a class="logButton text-center" href="<?php echo base_url('logs/commentLogs'); ?>">Gerir Logs dos  (Séries)</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="logButton text-center" href="<?php echo base_url('logs/commentCLogs'); ?>">Gerir Logs dos Comentários (Hub)</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="logButton text-center" href="<?php echo base_url('logs/compostLogs'); ?>">Gerir Logs dos Posts da Comunidade</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="logButton text-center" href="<?php echo base_url('logs/geralLogs'); ?>">Gerir Logs Gerais</a>
        </div>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>
