<?php include_once(VIEWS . 'header.php')?>
    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center"><?= $data['subtitle'] ?></h1>
        </div>
        <div class="card-body">

            <table class="table table-striped text-center" width="100%">
                <thead>
                <th>id</th>
                <th>Nombre</th>
                <th>Productos</th>
                <th>PrecioTotal</th>
                <th>Detalles</th>

                </thead>

                <tbody>

                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">Jose Manuel</td>
                    <td class="text-center">Prueba , PHP</td>
                    <td class="text-center">12€</td>
                    <td class="text-center">
                        <a href="<?= ROOT ?>adminSales/show/" class="btn btn-info">
                            Detalles
                        </a>
                    </td>
                </tr>

                </tbody>


            </table>
        </div>
        <div class="card-footer">

        </div>
    </div>
<?php include_once(VIEWS . 'footer.php')?>