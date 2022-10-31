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
                <?php for($i = $data['min']; $i < $data['numNext'] ; $i++):?>
                    <tr>
                        <td class="text-center"><?=$data['data'][$i]['user_id']?></td>
                        <td class="text-center"><?=$data['data'][$i]['first_name']?></td>
                        <td class="text-center"><?=$data['data'][$i]['name']?></td>
                        <td class="text-center"><?=$data['data'][$i]['price']?></td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminSales/show/<?=$data['data'][$i]['user_id']?>/<?=$data['data'][$i]['cart_id']?>" class="btn btn-info">
                                Detalles
                            </a>
                        </td>
                    </tr>

                <?php endfor; ?>
                </tbody>
            </table>
            <div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">

                        <?php if($data['num'] == 1 ):?>
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">First</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                        <?php else : ?>
                            <li class="page-item">
                                <a class="page-link" href="<?=ROOT?>AdminSales/index/1" tabindex="-1">First</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="<?=ROOT?>AdminSales/index/<?= ($data['num']-1) ?>" tabindex="-1">Previous</a>
                            </li>
                        <?php endif;?>

                        <?php for($i = 0; $i  < $data['next']; $i++) :?>
                        <li class="page-item <?= $i+1 == $data['num'] ? 'active' : '' ?>"><a class="page-link " href="<?=ROOT?>AdminSales/index/<?= ($i+1) ?>"><?= ($i+1) ?></a></li>
                        <?php endfor; ?>

                        <?php if($data['num'] == $data['next']) :?>
                            <li class="page-item disabled">
                            <a class="page-link" href="#" ">Next</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Last</a>
                            </li>
                        <?php else : ?>
                            <li class="page-item">
                            <a class="page-link" href="<?=ROOT?>AdminSales/index/<?= ($data['num'] + 1) ?>">Next</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="<?=ROOT?>AdminSales/index/<?= ($data['next']) ?>">Last</a>
                            </li>
                        <?php endif;?>

                    </ul>
                </nav>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
<?php include_once(VIEWS . 'footer.php')?>