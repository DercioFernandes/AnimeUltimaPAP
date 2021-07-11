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
                        <th scope="col">SEGUNDA-FEIRA-</th>
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
                                    <?php ?>
                                <?php endif ?>
                            </td>
                            <td><?php echo $episodio['titulo'] ?></td>
                            <td><?php echo $episodio['url'] ?></td>
                            <td><?php echo $episodio['dataRelease'] ?></td>
                            <td><?php echo $episodio['dataRelease'] ?></td>
                            <td><?php echo $episodio['dataRelease'] ?></td>
                            <td><?php echo $episodio['dataRelease'] ?></td>
                        </tr>

                        </tbody>
                    <?php endforeach; ?>
                </table>
                <input type="hidden" name="idTemporada" value="<?php echo $idTemporada; ?>">
            </form>
        </div>
    </div>


<?php $this->load->view('comuns/footer'); ?>