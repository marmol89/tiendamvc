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
                <?php for($i = 0; $i < count($data['data']);$i++):?>

                    <tr>
                        <td class="text-center"><?=$data['data'][$i]['user_id']?></td>
                        <td class="text-center"><?=$data['data'][$i]['first_name']?></td>
                        <td class="text-center"><?=$data['data'][$i]['name']?></td>
                        <td class="text-center"><?=$data['data'][$i]['price']?></td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminSales/show/" class="btn btn-info">
                                Detalles
                            </a>
                        </td>
                    </tr>

                <?php endfor; ?>
                </tbody>


            </table>
        </div>
        <div class="card-footer">

        </div>
    </div>
<?php include_once(VIEWS . 'footer.php')?>