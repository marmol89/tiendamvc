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

            $carts = $this->model->getCarts();
            $cartList = $this->model->groupingCards($carts);
            $data = [
                'titulo' => 'Administración de Ventas',
                'menu' => false,
                'admin' => true,
                'subtitle' => 'Administración de Ventas',
                'data' => $cartList,
            ];
            $this->view('admin/sales/sales', $data);
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }

    }


    public function show($id , $date)
    {

    }

}