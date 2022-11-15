<?php include_once(VIEWS . 'header.php') ?>
    <div class="card" id="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Iniciar sesión</li>
                <li class="breadcrumb-item"><a href="#">Datos de envío</a></li>
                <li class="breadcrumb-item"><a href="#">Forma de pago</a></li>
                <li class="breadcrumb-item"><a href="#">Verifica los datos</a></li>
            </ol>
        </nav>
        <h2><?= $data['subtitle'] ?></h2>
        <form class="text-end" action="<?= ROOT ?>cart/address" method="POST">
            <div class="form-group">
                <label for="user">Correo electrónico:</label>
                <input type="email" name="email" class="form-control"
                       placeholder="Escribe el correo electrónico"
                       value="<?= $data['data'] ?? '' ?>"
                >
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" class="form-control"
                       placeholder="Escribe la contraseña"
                >
            </div>
            <div class="form-group text-left">
                <input type="submit" value="Enviar" class="btn btn-success">
            </div>
        </form>
    </div>

<?php include_once(VIEWS . 'footer.php') ?>