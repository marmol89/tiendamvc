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
            $numUser = $this->model->getCartsUser();
            $cart = [];


            for ($i = 0; $i < count($numUser);$i++)
            {
                for($j = 1; $j < count($carts);$j++)
                {
                    if($numUser[$i]->user_id == $carts[$j]->user_id && $carts[($j-1)]->date == $carts[$j]->date)
                    {


                        array_push($cart , [ 'user_id' => $carts[$j]->user_id , 'date' => $carts[$j]->date ]);
                        var_dump($cart);
                    }
                }

            }





            $data = [
                'titulo' => 'Administración de Ventas',
                'menu' => false,
                'admin' => true,
                'subtitle' => 'Administración de Ventas',
                'data' => $carts,
            ];
            $this->view('admin/sales/sales', $data);
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }

    }
}