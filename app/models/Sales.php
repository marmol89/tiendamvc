<?php

class Sales
{
    private $db;

    public function __construct()
    {
        $this->db = Mysqldb::getInstance()->getDatabase();
    }

    //Consulta de Prueba
//use tiendamvc;
//
//select users.first_name , carts.date, carts.send , carts.discount, carts.quantity from carts INNER JOIN users on carts.user_id = users.id where users.id=1 AND carts.state=1;

}