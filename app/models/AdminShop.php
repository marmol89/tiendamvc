<?php

class AdminShop
{
    private $db;

    public function __construct()
    {
        $this->db = Mysqldb::getInstance()->getDatabase();
    }

    public function getNumUser()
    {

        $sql = 'select count(users.id) from users';

        $query = $this->db->prepare($sql);

        $query->execute();

        return $query->fetch(PDO::FETCH_NUM);

    }
}