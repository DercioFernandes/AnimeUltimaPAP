<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

    <div class="container-fluid">
        <div class="fm">
            <h1 class="text-center"> Calendário </h1>
            <form action="<?= base_url('episodio/gerirEps')?>" method="post" enctype="multipart/form-data">
                <table class="table">
                    <thead>
                    <tr class="titlefm">
                        <th scope="col">DOMINGO</th>
                        <th scope="col">SEGUNDA-FEIRA</th>
                        <th scope="col">TERÇA-FEIRA</th>
                        <th scope="col">QUARTA-FEIRA</th>
                        <th scope="col">QUINTA-FEIRA</th>
                        <th scope="col">SEXTA-FEIRA</th>
                        <th scope="col">SABADO</th>
                    </tr>
                    </thead>
                    <?php foreach ($calendario as $calendar): ?>
                        <tbody>
                        <tr class="descfm">
                            <td>
                                <?php if($calendar['dayOfWeek'] == 0): ?>
                                    <?php $query = $this->main_model->get_main_where_array('series','idSerie',$calendar['idSerie']); ?>
                                    <p><?php echo $query[0]['Titulo'] ?></p>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if($calendar['dayOfWeek'] == 1): ?>
                                    <?php $query = $this->main_model->get_main_where_array('series','idSerie',$calendar['idSerie']); ?>
                                    <p><?php echo $query[0]['Titulo'] ?></p>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if($calendar['dayOfWeek'] == 2): ?>
                                    <?php $query = $this->main_model->get_main_where_array('series','idSerie',$calendar['idSerie']); ?>
                                    <p><?php echo $query[0]['Titulo'] ?></p>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if($calendar['dayOfWeek'] == 3): ?>
                                    <?php $query = $this->main_model->get_main_where_array('series','idSerie',$calendar['idSerie']); ?>
                                    <p><?php echo $query[0]['Titulo'] ?></p>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if($calendar['dayOfWeek'] == 4): ?>
                                    <?php $query = $this->main_model->get_main_where_array('series','idSerie',$calendar['idSerie']); ?>
                                    <p><?php echo $query[0]['Titulo'] ?></p>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if($calendar['dayOfWeek'] == 5): ?>
                                    <?php $query = $this->main_model->get_main_where_array('series','idSerie',$calendar['idSerie']); ?>
                                    <p><?php echo $query[0]['Titulo'] ?></p>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if($calendar['dayOfWeek'] == 6): ?>
                                    <?php $query = $this->main_model->get_main_where_array('series','idSerie',$calendar['idSerie']); ?>
                                    <p><?php echo $query[0]['Titulo'] ?></p>
                                <?php endif ?>
                            </td>
                        </tr>

                        </tbody>
                    <?php endforeach; ?>
                </table>
            </form>
        </div>
    </div>


<?php $this->load->view('comuns/footer'); ?>