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
            $cartList = array();

            array_push($cartList , array(
                'user_id' => $carts[0]->user_id,
                'first_name' => $carts[0]->first_name,
                'porduct_id' => $carts[0]->porduct_id,
                'name' => $carts[0]->name,
                'date' => $carts[0]->date ,
                'send' => $carts[0]->send ,
                'discount' => $carts[0]->discount ,
                'quantity' => $carts[0]->quantity ,
                'price' => $carts[0]->price,
            ));


            for ($i = 1; $i < count($carts);$i++)
            {
                $axu = false;

                for($j = 0; $j < count($cartList);$j++)
                {
                    if($cartList[$j]['user_id'] == $carts[$i]->user_id && $carts[$i]->date == $cartList[$j]['date'])
                    {
                        if($carts[$i]->porduct_id != $cartList[$j]['porduct_id'] ){
                            $axu = true;
                            break;
                        }
                    }else {
                        $axu = false;
                    }
                }
                if($axu){
                    $cartList[$j]['name'] =  $cartList[$j]['name'] . ' , ' . $carts[$i]->name;
                    $cartList[$j]['price'] = number_format(floatval($cartList[$j]['price'] + $carts[$i]->price) , 2);
                }else{
                    array_push($cartList , array(
                        'user_id' => $carts[$i]->user_id,
                        'first_name' => $carts[$i]->first_name,
                        'porduct_id' => $carts[$i]->porduct_id,
                        'name' => $carts[$i]->name,
                        'date' => $carts[$i]->date ,
                        'send' => $carts[$i]->send ,
                        'discount' => $carts[$i]->discount ,
                        'quantity' => $carts[$i]->quantity ,
                        'price' => $carts[$i]->price,
                    ));
                }
            }

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