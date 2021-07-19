<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

    <div class="container-fluid">
        <div class="fm">
            <h1 class="text-center">Users</h1>
            <table class="table">
                <thead>
                <tr class="titlefm">
                    <th scope="col">ID</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PERMISSÕES</th>
                    <th scope="col">AÇÓES</th>
                </tr>
                </thead>
                <?php foreach ($users as $user): ?>
                    <tbody>
                    <tr class="descfm">
                        <td><?php echo $user['idUser'] ?></td>
                        <td><?php echo $user['Username'] ?></td>
                        <td><?php echo $user['Email'] ?></td>
                        <td><?php echo $user['Permissoes'] ?></td>
                        <td>
                            <a href="<?php echo base_url('User/editUser/' . $user['idUser']) ?>" class="btn btn-outline-dark btn-sm" type="submit" name="Editar"> Editar </a>
                            <a href="<?php echo base_url('User/removerUser/' . $user['idUser']) ?>" class="btn btn-outline-dark btn-sm" type="submit" name="Remover"> Remover </a>
                        </td>
                    </tr>

                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>


<?php $this->load->view('comuns/footer'); ?>