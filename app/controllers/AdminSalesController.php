<?php

class AdminSalesController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('Sales');
    }

    public function index($numNext = 1)
    {
        $session = new SessionAdmin();

        if ($session->getLogin()) {

            $carts = $this->model->getCarts();
            $cartList = $this->model->groupingCards($carts);

            $next = ceil( count($cartList)/5 );

            //Calcular linea
            $num = intval($numNext) ;

            $numNext = ($numNext * 5);
            $min = $numNext -5;

            if($numNext > count($cartList)){
                $aux = count($cartList) - $min;
                $numNext = $min + $aux;
            }

            $data = [
                'titulo' => 'Administración de Ventas',
                'menu' => false,
                'admin' => true,
                'subtitle' => 'Administración de Ventas',
                'data' => $cartList,
                'next' => $next,
                'numNext' => $numNext,
                'num' => $num,
                'min' => $min,
            ];
            $this->view('admin/sales/sales', $data);
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }

    }


    public function show($user_id , $cart_id)
    {

        $date = $this->model->getDateByCarts($user_id , $cart_id);
        $cart = $this->model->getCart($user_id , $date->date);
        $shipping = $this->model->getShipping($user_id);

        $data = [
            'titulo' => 'Carrito',
            'menu' => false,
            'admin' => true,
            'user_id' => $user_id,
            'data' => $cart,
            'shipping' => $shipping,
        ];

        $this->view('admin/sales/show', $data);

    }

}