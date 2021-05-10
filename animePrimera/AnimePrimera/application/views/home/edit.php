<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

    <div class="container-fluid">
        <form action="<?=base_url('homepage/options')?>" method="post" enctype="multipart/form-data">
            <?php foreach($table as $t): ?>
                <?php if($c <= $count): ?>
                    <?php if(isset($table[$c]) && ($t['posicao'] == $table[$c]['posicao'])): ?>
                        <div class="row">
                            <div class="col">
                                <?php echo($t['conteudo']); ?>
                            </div>
                            <div class="col">
                                <button class="btn btn-outline-dark btn-sm" type="submit" value="<?php echo($t['id']) ?>" name="editar"> Editar </button>
                                <button class="btn btn-outline-dark btn-sm" type="submit" value="<?php echo($t['id']) ?>" name="remover"> Remover </button>
                            </div>
                            <div class="col">
                                <?php echo($table[$c]['conteudo']); ?>
                            </div>
                            <div class="col">
                                <button class="btn btn-outline-dark btn-sm" type="submit" value="<?php echo($table[$c]['id']) ?>" name="editar"> Editar </button>
                                <button class="btn btn-outline-dark btn-sm" type="submit" value="<?php echo($table[$c]['id']) ?>" name="remover"> Remover </button>
                            </div>
                            <?php $c++ ?>
                        </div>
                    <?php else: ?>
                        <?php if((isset($table[$c-2])) && ($t['posicao'] != $table[$c-2]['posicao'])): ?>
                            <div class="row">
                                <div class="col">
                                    <?php echo($t['conteudo']);?>
                                </div>
                                <div class="col">
                                    <button class="btn btn-outline-dark btn-sm" type="submit" value="<?php echo($t['id']) ?>" name="editar"> Editar </button>
                                    <button class="btn btn-outline-dark btn-sm" type="submit" value="<?php echo($t['id']) ?>" name="remover"> Remover </button>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php $c++ ?>
                    <?php endif; ?>
                <?php endif; ?>

            <?php endforeach; ?>
        </form>
        <a class="btn btn-outline-dark btn-sm" href="<?php echo base_url('addElement') ?>"> Adicionar Elemento </a>
    </div>
<?php $this->load->view('comuns/footer'); ?>