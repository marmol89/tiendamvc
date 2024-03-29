<?php include_once (VIEWS . 'header.php')?>

    <div class="card p-4 bg-light">

        <div class="card-header">
            <h1 class="text-center">Usuarios Administradores</h1>
        </div>

        <div class="card-body">
            <table class="table table-striped text-center" width="100%">
                <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Editar</th>
                <th>Borrar</th>
                </thead>

                <tbody>
                <?php foreach ($data['usersAdmin'] as $user): ?>
                    <tr>
                        <td class="text-center"><?= $user->id ?></td>
                        <td class="text-center"><?= $user->name ?></td>
                        <td class="text-center"><?= $user->email ?></td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminUser/update/<?= $user->id ?>" class="btn btn-info">
                                Editar
                            </a>
                        </td>
                        <td class="text-center btn"><a href="<?= ROOT ?>adminUser/delete/<?= $user->id ?>" class="btn btn-danger">
                                Borrar
                            </a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-sm-6">
                    <a href="<?= ROOT ?>AdminUser/create" class="btn btn-success">
                        Crear Usuario
                    </a>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>

<!-- Para usuarios  -->

    <div class="card p-4 bg-light mt-5">

        <div class="card-header">
            <h1 class="text-center">Usuarios</h1>
        </div>

        <div class="card-body">
            <table class="table table-striped text-center" width="100%">
                <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Detalles</th>
                <th>Borrar</th>
                </thead>

                <tbody>
                <?php foreach ($data['users'] as $user): ?>
                    <tr>
                        <td class="text-center"><?= $user->id ?></td>
                        <td class="text-center"><?= $user->first_name . ' ' .  $user->last_name_1 ?></td>
                        <td class="text-center"><?= $user->email ?></td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminUser/show/<?= $user->id ?>" class="btn btn-info">
                                Detalles
                            </a>
                        </td>
                        <td class="text-center btn"><a href="<?= ROOT ?>adminUser/deleteUser/<?= $user->id ?>" class="btn btn-danger">
                                Borrar
                            </a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>

        <div class="card-footer">
            </div>
        </div>
    </div>
<?= include_once (VIEWS . 'footer.php')?>