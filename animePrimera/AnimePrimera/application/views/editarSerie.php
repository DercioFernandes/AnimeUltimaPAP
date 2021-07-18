<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
    <body>

<div class="container-fluid">
    <div class="formSerie">
        <h1 class="text-center formTitle">EDITAR SÉRIE</h1>
        <form class="formBody" action="<?= base_url('serie/editar')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <h6 class="labelEdit text-center">Título</h6>
                <input class="form-control" id="titulo" name="titulo" placeholder="Título" type="text" required="required" value="<?php echo $serie[0]['Titulo'] ?>"/>
            </div>
            <div class="form-group">
                <h6 class="labelEdit text-center">Autor</h6>
                <input class="form-control" id="autor" name="autor" placeholder="Autor" type="text" required="required" value="<?php echo $serie[0]['Autor'] ?>"/>
            </div>
            <div class="form-group">
                <h6 class="labelEdit text-center">Descrição</h6>
                <textarea class="form-control" id="descricao" name="descricao" required="required"> <?php echo $serie[0]['Descricao']  ?> </textarea>
            </div>
            <div class="form-group">
                <h6 class="labelEdit text-center">Tipo</h6>
                <input class="form-control" id="tipo" name="tipo" placeholder="Tipo" type="text" required="required" value="<?php echo $serie[0]['Tipo']  ?>"/>
                <small>(Dividir com ' , ' os generos)</small>
            </div>
            <div class="form-group">
                <h6 class="labelEdit text-center">Data de Lançamento</h6>
                <input class="form-control" id="dataRelease" name="dataRelease" placeholder="Data de Lançamento" type="text" required="required" value="<?php echo $serie[0]['DataRelease'] ?>"/>
            </div>
            <div class="form-group">
                <h6 class="labelEdit text-center">Thumbnail</h6>
                <input class="form-control text-center" id="thumbnail" name="thumbnail" placeholder="Thumbnail" type="file"/>
            </div>
            <div class="form-group">
                Manter Foto de Perfil:
                <input class="text-center" checked type="checkbox" id="manterImagem" name="manterImagem" value="1">
            </div>

            <input type="hidden" name="idSerie" value="<?php echo $idSerie; ?>">

            <div class="form-group">
                <input type="submit" class="btnSubmitEdit btn-block" name="Editar" value="Editar">
            </div>
        </form>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>