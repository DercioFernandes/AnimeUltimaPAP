<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
    <body>

<div class="container-fluid">
    <div class="formSerie">
        <h1 class="text-center formTitle">CRIAR PUBLICAÇÃO</h1>
        <form class="formBody" action="<?= base_url('hub/criarPost')?>" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <h6 class="labelEdit text-center">Vídeo</h6>
                        Adicionar vídeo:
                        <input type="checkbox" name="hasVideo" value="1" class="text-center">
                        <input class="form-control text-center" id="video_name" name="video_name" placeholder="Vídeo" type="file"/>
                        <input type="hidden" name="video_upload" value="Upload Video"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <h6 class="labelEdit text-center">Imagem</h6>
                        Adicionar imagem:
                        <input type="checkbox" name="hasImage" value="1" class="text-center">
                        <input class="form-control text-center" id="thumbnail" name="thumbnail" placeholder="Thumbnail" type="file"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <h6 class="labelEdit text-center">Título</h6>
                <input class="form-control" id="titulo" name="titulo" placeholder="Título" type="text" required="required">
            </div>

            <div class="form-group">
                <h6 class="labelEdit text-center">Descrição</h6>
                <textarea class="form-control" id="descricao" name="descricao" required="required"> </textarea>
            </div>

            <?php
            if(!empty($user)):
                ?>
                <?php if($perms > 3): ?>
                    <div class="form-group">
                        <h6 class="labelEdit text-center">Anúncio de Staff</h6>
                        <input type="checkbox" name="staffpost" value="1" class="text-center">
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="form-group">
                <input class="form-control" type="submit" class="btn btn-primary" name="Criar" value="Criar">
            </div>
        </form>
    </div>
</div>


<?php $this->load->view('comuns/footer'); ?>