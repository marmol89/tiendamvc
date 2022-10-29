<?php

class Sales
{
    private $db;

    public function __construct()
    {
        $this->db = Mysqldb::getInstance()->getDatabase();
    }


    public function getCarts()
    {
        $sql = 'select carts.id cart_id , users.id user_id , users.first_name , carts.product_id porduct_id , products.name , carts.date, carts.send , carts.discount, carts.quantity , products.price from carts JOIN users on carts.user_id = users.id JOIN products on products.id = carts.product_id where carts.state=1 order by carts.date';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    public function groupingCards($carts){
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

        return $cartList;

    }

}