<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
    <body>

<div class="container-fluid">
    <div class="formSerie">
        <h1 class="text-center formTitle">EDITAR POST</h1>
        <form class="formBody" action="<?= base_url('hub/editarPost')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <h6 class="labelEdit text-center">Título</h6>
                <input class="form-control" id="titulo" name="titulo" placeholder="Título" type="text" required="required" value="<?php echo $compost[0]['titulo'] ?>"/>
            </div>
            <div class="form-group">
                <h6 class="labelEdit text-center">Descrição</h6>
                <textarea class="form-control" id="descricao" name="descricao" required="required"> <?php echo $compost[0]['descricao']  ?> </textarea>
            </div>

            <input type="hidden" name="idAuthor" value="<?php echo $compost[0]['idUser'] ?>">
            <input type="hidden" name="idCompost" value="<?php echo $idCompost; ?>">

            <div class="form-group">
                <input type="submit" class="btnSubmitEdit btn-block" name="Editar" value="Editar">
            </div>
        </form>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>