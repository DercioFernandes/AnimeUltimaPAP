<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>

<div id="container">
    <h1>Criar Elemento</h1>
</div>
<form action="<?= base_url('homepage/editarLista')?>" method="post" enctype="multipart/form-data">
    <div id="container">

        <h4>Conteudo</h4>
        <div class="form-group">
            <label> Topicos da Lista('.' para Quebrar Linha):
                <input name="conteudo" type="text" value="<?php echo $conteudo ?>">
            </label>
        </div>

        <h4>Título</h4>
        <div class="form-group">
            <label>
                <input type="checkbox" name="tituloEx" value="1"> Adicionar Título
            </label>
        </div>
        <div class="form-group">
            <label> (Em caso de Adicionar Título)Título:
                <input name="titulo" type="text" value="<?php echo $titulolista ?>">
            </label>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="subtituloEx" value="1"> Adicionar SubTítulo
            </label>
        </div>
        <div class="form-group">
            <label> (Em caso de Adicionar SubTítulo)SubTítulo:
                <input name="subtitulo" type="text" value="<?php echo $subtitulolista ?>">
            </label>
        </div>

        <h4>Posicionamento</h4>
        <div class="form-group">
            <label> Posicão:
                <input name="posicao" type="number" value="<?php echo $query->posicao ?>">
            </label>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" class="label-info" name="perContainer" value="1"> Linha Inteira
            </label>
        </div>
        <div class="form-group">
            <label> Lado onde se Posicionará(caso Linha Inteira não seja escolhida)
                <select name="side">
                    <option value="1">Esquerda</option>
                    <option value="2">Direita</option>
                </select>
            </label>
        </div>

        <h4>Extras</h4>
        <div class="form-group">
            <label> Tipo de Botão
                <select name="tipolink">
                    <option value="1">Clipping</option>
                    <option value="2">Transcrição</option>
                    <option value="3">Área Cliente</option>
                </select>
            </label>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="botaoEx" value="1"> Adicionar Botão
            </label>
        </div>
        <div class="form-group">
            <label> Tipo de Link
                <select name="tipolink">
                    <option value="1">Clipping</option>
                    <option value="2">Transcrição</option>
                    <option value="3">Área Cliente</option>
                </select>
            </label>
        </div>
        <div class="form-group">
            <label> Texto do Link
                <input name="linktext" type="text">
            </label>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="linkEx" value="1"> Adicionar Link
            </label>
        </div>
        <input type="hidden" value="<?php echo $query->id ?>" name="id">

        <div class="form-group">
            <input class="form-control" type="submit" class="btn btn-primary" value="Editar">
        </div>
    </div>
</form>
<?php $this->load->view('comuns/footer'); ?>