<?php include_once (VIEWS . 'header.php')?>

    <div class="card p-4 bg-light">

        <div class="card-header">
            <h1 class="text-center">Administracion de productos</h1>
        </div>

        <div class="card-body">
            <table class="table table-striped text-center" width="100%">
                <thead>
                <th>Id</th>
                <th>type</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Modificar</th>
                <th>Borrar</th>
                </thead>

                <tbody>
                <?php foreach ($data['products'] as $product): ?>
                    <tr>
                        <td class="text-center"><?= $product->id ?></td>
                        <td class="text-center"><?= $data['type'][$product->type - 1]->description ?></td>
                        <td class="text-center"><?= $product->name ?></td>
                        <td class="text-center"><?= html_entity_decode($product->description)?></td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminProduct/update/<?= $product->id ?>" class="btn btn-info">
                                Editar
                            </a>
                        </td>
                        <td class="text-center btn"><a href="<?= ROOT ?>adminProduct/delete/<?= $product->id ?>" class="btn btn-danger">
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
                    <a href="<?= ROOT ?>AdminProduct/create" class="btn btn-success">
                        Crear Producto
                    </a>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>
<?= include_once (VIEWS . 'footer.php')?>