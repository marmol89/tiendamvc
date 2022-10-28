<?php

class Sales
{
    private $db;

    public function __construct()
    {
        $this->db = Mysqldb::getInstance()->getDatabase();
    }


    public function getCartsUser()
    {
        $sql = 'select users.id , users.first_name , carts.product_id , products.name , carts.date, carts.send , carts.discount, carts.quantity from carts JOIN users on carts.user_id = users.id JOIN products on products.id = carts.product_id where carts.state=1';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    //Consulta de Prueba
//use tiendamvc;
//
//select users.id , users.first_name , carts.product_id , products.name , carts.date, carts.send , carts.discount, carts.quantity from carts JOIN users on carts.user_id = users.id JOIN products on products.id = carts.product_id where carts.state=1;





}