<?php

class Cart
{
    private $db;

    public function __construct()
    {
        $this->db = Mysqldb::getInstance()->getDatabase();
    }

    public function verifyProduct($product_id , $user_id)
    {
        $sql = 'SELECT * FROM carts WHERE product_id=:product_id AND user_id=:user_id AND state=0';
        $query = $this->db->prepare($sql);
        $params = [
          ':product_id' => $product_id,
          ':user_id' => $user_id,
        ];

        $query->execute($params);

        return $query->rowCount();
    }

    public function addProduct($product_id , $user_id)
    {

        $sql = 'SELECT * FROM products WHERE id=:id';
        $query = $this->db->prepare($sql);
        $query->execute([':id' => $product_id]);
        $product = $query->fetch(PDO::FETCH_OBJ);

        $sql2 = 'INSERT INTO carts(state, user_id, product_id, quantity, discount, send, date)
                    VALUES (:state, :user_id, :product_id, :quantity, :discount, :send, :date)';
        $query2 = $this->db->prepare($sql2);
        $params2 = [
            ':state' => 0,
            ':user_id' => $user_id,
            ':product_id' => $product_id,
            ':quantity' => 1,
            ':discount' => $product->discount,
            ':send' => $product->send,
            ':date' => date('Y-m-d H:i:s'),
        ];

        $query2->execute($params2);
        return $query2->rowCount();



    }

    public function getCart($user_id)
    {
        $sql = 'SELECT c.user_id as user, c.product_id as product, c.quantity as quantity, 
                    c.send as send, c.discount as discount, p.price as price, p.image as image, p.description as description,
                    p.name as name FROM carts as c, products as p 
                       WHERE c.user_id=:user_id AND state=0 AND c.product_id=p.id';

        $query = $this->db->prepare($sql);
        $query->execute([':user_id' => $user_id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    public function update($user , $product , $quantity)
    {

        $sql = 'UPDATE carts SET quantity=:quantity WHERE user_id=:user_id AND product_id=:product_id';
        $query = $this->db->prepare($sql);
        $params = [
            ':user_id' => $user,
            ':product_id' => $product,
            ':quantity' => $quantity,
        ];

        return $query->execute($params);

    }

    public function delete($product, $user)
    {
        $sql = 'DELETE FROM carts WHERE user_id=:user_id AND product_id=:product_id AND state=0';

        $query = $this->db->prepare($sql);

        $params = [
            ':user_id' => $user,
            ':product_id' => $product,
        ];

        return $query->execute($params);
    }

    public function closeCart($id, $state)
    {
        $sql = 'UPDATE carts SET state=:state, date=:date_update WHERE user_id=:user_id AND state=0';
        $query = $this->db->prepare($sql);
        $params = [
            ':user_id' => $id,
            ':state' => $state,
            ':date_update' => date('Y-m-d H:i:s'),
        ];
        return $query->execute($params);
    }

    public function getPayments(){
        $sql = 'SELECT * FROM payments';
        $query = $this->db->prepare($sql);
        $query ->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    public function getTotal($cart) {
        $total = [
            'subtotal' => 0,
            'send' => 0,
            'discount' => 0,
            'total' => 0,
        ];
        foreach ($cart as $value) {
            $total['subtotal'] += $value->price * $value->quantity;
            $total['send'] += $value->send;
            $total['discount'] += $value->discount;
        }

        $total['total'] = $total['subtotal'] - $total['discount'] + $total['send'];

        return $total;
    }

}