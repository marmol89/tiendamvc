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

    public function getCartsUser(){

        $sql = 'select DISTINCT user_id from carts where state=1';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    //Consulta de Prueba
//use tiendamvc;
//
//select users.id , users.first_name , carts.product_id , products.name , carts.date, carts.send , carts.discount, carts.quantity from carts JOIN users on carts.user_id = users.id JOIN products on products.id = carts.product_id where carts.state=1;





}