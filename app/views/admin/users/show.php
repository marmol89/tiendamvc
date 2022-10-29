<?php include_once(VIEWS . 'header.php')?>
<div class="card p-4 bg-light">

    <div class="card-header">
        <h1 class="text-center"><?= $data['titulo'] ?></h1>
    </div>

    <div class="card-body">

        <form method="post">
            <div class="form-group text-left">
                <label for="first_name">Nombre:</label>
                <input type="text" name="first_name" id="first_name" class="form-control"
                       disabled
                       value="<?php isset($data['user']->first_name) ? print $data['user']->first_name : '' ?>"
                >
            </div>
            <div class="form-group text-left">
                <label for="last_name_1">Apellido 1:</label>
                <input type="text" name="last_name_1" id="last_name_1" class="form-control"
                       disabled
                       value="<?php isset($data['user']->last_name_1) ? print $data['user']->last_name_1 : '' ?>"
                >
            </div>
            <div class="form-group text-left">
                <label for="last_name_2">Apellido 2:</label>
                <input type="text" name="last_name_2" id="last_name_2" class="form-control"
                       disabled
                       value="<?php isset($data['user']->last_name_2) ? print $data['user']->last_name_2 : '' ?>"
                >
            </div>
            <div class="form-group text-left">
                <label for="email">Correo electrónico:</label>
                <input type="email" name="email" id="email" class="form-control"
                       disabled
                       value="<?php isset($data['user']->email) ? print $data['user']->email : '' ?>"
                >
            </div>
            <div class="form-group text-left">
                <label for="address">Dirección:</label>
                <input type="text" name="address" id="address" class="form-control"
                       disabled
                       value="<?php isset($data['user']->address) ? print $data['user']->address : '' ?>"
                >
            </div>
            <div class="form-group text-left">
                <label for="city">Ciudad:</label>
                <input type="text" name="city" id="city" class="form-control"
                       disabled
                       value="<?php isset($data['user']->city) ? print $data['user']->city : '' ?>"
                >
            </div>
            <div class="form-group text-left">
                <label for="state">Provincia:</label>
                <input type="text" name="state" id="state" class="form-control"
                       disabled
                       value="<?php isset($data['user']->state) ? print $data['user']->state : '' ?>"
                >
            </div>
            <div class="form-group text-left">
                <label for="postcode">Código postal:</label>
                <input type="text" name="postcode" id="postcode" class="form-control"
                       disabled
                       value="<?php isset($data['user']->zipcode) ? print $data['user']->zipcode : '' ?>"
                >
            </div>
            <div class="form-group text-left">
                <label for="country">País:</label>
                <input type="text" name="country" id="country" class="form-control"
                       disabled
                       value="<?php isset($data['user']->country) ? print $data['user']->country : '' ?>"
                >
            </div>

            <div class="form-group text-left">
                <label for="date">Fecha de alta</label>
                <input type="text" name="date" id="date" class="form-control"
                       disabled
                       value="<?php isset($data['user']->created_at) ? print $data['user']->created_at : '' ?>"
                >
            </div>

            <div class="form-group text-left">
                <label for="status">Estado</label>
                <input type="text" name="status" id="status" class="form-control"
                       disabled
                       <?php if(!$data['user']->deleted):?>
                       value="Activo"
                       <?php else :?>
                           value="Inactivo"
                       <?php endif; ?>
                >
            </div>

            <?php if($data['user']->deleted):?>
                <div class="form-group text-left">
                    <label for="deleted">Fecha de Baja</label>
                    <input type="deleted" name="deleted" id="deleted" class="form-control"
                           disabled
                           value="<?php isset($data['user']->deleted_at) ? print $data['user']->deleted_at : '' ?>"
                    >
                </div>
            <?php endif; ?>

            <div class="form-group text-left">
                <a href="<?= ROOT ?>AdminUser/" class="btn btn-info">Regresar</a>
            </div>
        </form>
    </div>


    </div>

    <div class="card-footer">

    </div>
</div>
<?php include_once (VIEWS . 'footer.php')?>