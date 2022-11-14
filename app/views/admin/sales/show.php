<?php include_once(VIEWS . 'header.php') ?>
<?php $verify = false; $subtotal = 0; $send = 0; $discount = 0; $user_id = $data['user_id'] ?>
<div class="card p-1 bg-light">
    <div class="card-header">
        <h1 class="text-center">Detalles Carrito</h1>
    </div>
    <div class="card-body">
        <form action="<?= ROOT ?>cart/update" method="POST">
            <table class="table table-stripped" width="100%">
                <tr>
                    <th width="12%">Producto</th>
                    <th width="58%">Descripción</th>
                    <th width="1.8%">Cant.</th>
                    <th width="10.12%">Precio</th>
                    <th width="10.12%">Subtotal</th>
                    <th width="1%">&nbsp;</th>
                </tr>
                <?php foreach ($data['data'] as $key => $value): ?>
                    <tr>
                        <td><img src="<?= ROOT ?>img/<?= $value->image ?>" width="105" alt="<?= $value->name ?>"></td>
                        <td>
                            <b><?= $value->name ?></b>
                            : <?= substr(html_entity_decode($value->description),0, 200) ?>
                        </td>
                        <td class="text-end">
                            <input type="number" name="c<?= $key ?>" class="text-right"
                                   value="<?= number_format($value->quantity, 0) ?>"
                                   min="1" max="99" disabled
                            ><input type="hidden" name="i<?= $key ?>" value="<?= $value->product ?>">
                        </td>
                        <td class="text-end"><?= number_format($value->price, 2) ?> &euro;</td>
                        <td class="text-end">
                            <?= number_format($value->price * $value->quantity, 2) ?> &euro;
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php $subtotal += $value->price * $value->quantity ?>
                    <?php $discount += $value->discount ?>
                    <?php $send += $value->send ?>
                <?php endforeach; ?>
                <?php $total = $subtotal - $discount + $send ?>
                <input type="hidden" name="rows" value="<?= count($data['data']) ?>">
                <input type="hidden" name="user_id" value="<?= $data['user_id'] ?>">
            </table>
            <hr>
            <div class="d-flex flex-row justify-content-between">
                <div class="">
                    <table class="w-100">
                            <tr>
                                <td>Nombre:</td>
                                <td class="text-black rounded" ><?= $data['shipping']->name?></td>
                            </tr>
                            <tr>
                                <td>Apellidos:</td>
                                <td class="text-black rounded" ><?= $data['shipping']->last_name_1 . ' ' . $data['shipping']->last_name_2 ?></td>
                            </tr>
                            <tr>
                                <td>email :</td>
                                <td class="text-black rounded" ><?=$data['shipping']->email?></td>
                            </tr>
                            <tr>
                                <td>Address :</td>
                                <td class="text-black rounded" ><?= $data['shipping']->address?></td>
                            </tr>
                            <tr>
                                <td>Ciudad :</td>
                                <td class="text-black rounded" ><?= $data['shipping']->city?></td>
                            </tr>
                            <tr>
                                <td>Provincia :</td>
                                <td class="text-black rounded" ><?= $data['shipping']->state?></td>
                            </tr>
                            <tr>
                                <td>Código postal :</td>
                                <td class="text-black rounded" ><?= $data['shipping']->zipcode?></td>
                            </tr>
                            <tr>
                                <td>País :</td>
                                <td class="text-black rounded" ><?= $data['shipping']->country?></td>
                            </tr>

                    </table>

                </div>
                <div class="">
                    <table class="text-end w-100 me-5 ">
                        <tr>
                            <td>Subtotal:</td>
                            <td class="bg-danger text-white rounded" ><?= number_format($subtotal, 2) ?> &euro;</td>
                        </tr>
                        <tr>
                            <td>Descuento:</td>
                            <td class="bg-dark text-white rounded" ><?= number_format($discount, 2) ?> &euro;</td>
                        </tr>
                        <tr>
                            <td>Envío:</td>
                            <td class="bg-info text-white rounded" ><?= number_format($send, 2) ?> &euro;</td>
                        </tr>
                        <tr>
                            <td>Total:</td>
                            <td class="bg-primary text-white rounded" ><?= number_format($total, 2) ?> &euro;</td>
                        </tr>
                    </table>

                </div>
            </div>

        </form>
    </div>

    <div class="card-footer">
        <a class="btn btn-info" href="<?= ROOT ?>AdminSales">Regresar</a>
    </div>
</div>
<?php include_once(VIEWS . 'footer.php') ?>