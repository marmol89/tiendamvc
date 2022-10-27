<?php

class AdminSalesController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('Sales');
    }

    public function index()
    {
        $session = new SessionAdmin();

        if ($session->getLogin()) {
            $data = [
                'titulo' => 'Administración de Ventas',
                'menu' => false,
                'admin' => true,
                'subtitle' => 'Administración de Ventas',
            ];
            $this->view('admin/sales/sales', $data);
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }

    }
}