<?php

class AdminShopController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('AdminShop');
    }

    public function index()
    {
        $session = new SessionAdmin();

        if ($session->getLogin()) {

            $numUser = $this->model->getNumUser();
            $data = [
                'titulo' => 'Bienvenid@ a la administración de la tienda',
                'menu' => false,
                'admin' => true,
                'subtitle' => 'Administración de la tienda',
                'numUser' => intval($numUser[0]),
            ];
            $this->view('admin/shop/index', $data);
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }

    }
}