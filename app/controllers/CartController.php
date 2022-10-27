<?php

class CartController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('Cart');
    }

    public function index($errors = [])
    {
        $session = new Session();

        if ($session->getLogin()) {

            $user_id = $session->getUserId();
            $cart = $this->model->getCart($user_id);

            $data = [
                'titulo' => 'Carrito',
                'menu' => true,
                'user_id' => $user_id,
                'data' => $cart,
                'errors' => $errors,
            ];

            $this->view('carts/index', $data);

        } else {
            header('location:' . ROOT);
        }
    }


    public function addProduct($product_id , $user_id)
    {

        $errors = [];

        if(! $this->model->verifyProduct($product_id, $user_id)){

            if($this->model->addProduct($product_id , $user_id) == false){
                array_push($errors , 'Error al insertar el producto en el carrito');
            }
        }

        $this->index($errors);
    }

    public function update()
    {
        if(isset($_POST['rows']) && isset($_POST['user_id'])){
            $errors = [];
            $rows = $_POST['rows'];
            $user_id = $_POST['user_id'];

            for ($i = 0; $i < $rows; $i++){
                $product_id = $_POST['i' . $i];
                $quantity = $_POST['c'.$i];
                if(! $this->model->update($user_id , $product_id , $quantity))
                {
                    array_push($errors, 'Error al actualizar el producto');
                }
            }
        }

        $this->index($errors);

    }

    public function delete($product, $user)
    {
        $errors = [];

        if( ! $this->model->delete($product, $user)) {
            array_push($errors, 'Error al borrar el producto');
        }

        $this->index($errors);
    }

    public function checkout(){
        $session = new Session();
        if($session->getLogin()){

            $user = $session->getUser();
            $data = [
                'titulo' => 'Carrito | Checkout',
                'subtitle' => 'Checkout | Iniciar session',
                'menu' => true,
                'data' => $user,
            ];
            $this->view('carts/address' , $data);
        }else {
            $data = [
                'titulo' => 'Carrito | Checkout',
                'subtitle' => 'Checkout | Iniciar session',
                'menu' => true,
            ];

            $this->view('carts/checkout' , $data);
        }
    }

    public function paymentmode()
    {
        //Desarollar en mi casa Solo por POST y validar datos y comprobar si esta iniciado la session

        $session = new Session();

        if( ! $session->getLogin()){
            header('LOCATION:' . ROOT);
        }

        $errors = [];
        $user = $session->getUser();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $firstName = $_POST['first_name'] ?? '';
            $lastName1 = $_POST['last_name_1'] ?? '';
            $lastName2 = $_POST['last_name_2'] ?? '';
            $email = $_POST['email'] ?? '';
            $address = $_POST['address'] ?? '';
            $city = $_POST['city'] ?? '';
            $state = $_POST['state'] ?? '';
            $postcode = $_POST['postcode'] ?? '';
            $country = $_POST['country'] ?? '';

            if($user->first_name != $firstName) {
                if ($firstName == '') {
                    array_push($errors, 'Hay que poner un Nombre Obligatirio');
                } else {
                    $user->first_name = $firstName;
                }
            }

            if($user->last_name_1 != $lastName1){
                if($lastName1 == ''){
                    array_push($errors , 'Hay que poner el Primer apellido Obligatirio');
                }else {
                    $user->last_name_1 = $lastName1;
                }
            }

            if($user->last_name_2 != $lastName2){
                if($lastName2 == ''){
                    array_push($errors , 'Hay que poner el Segundo apellido Obligatirio');
                }else {
                    $user->last_name_2 = $lastName2;
                }
            }

            if($user->email != $email){
                if($email == ''){
                    array_push($errors , 'Hay que poner el Email Obligatirio');
                }else {
                    $user->email = $email;
                }
            }

            if($user->address != $address){
                if($address == ''){
                    array_push($errors , 'Hay que poner la Direccion Obligatirio');
                }else {
                    $user->address = $address;
                }
            }

            if($user->city != $city){
                if($city == ''){
                    array_push($errors , 'Hay que poner la ciudad Obligatirio');
                }else {
                    $user->city = $city;
                }
            }

            if($user->state != $state){
                if($state == ''){
                    array_push($errors , 'Hay que poner la Probincia Obligatirio');
                }else {
                    $user->state = $state;
                }
            }

            if($user->zipcode != $postcode){
                if($postcode == 0){
                    array_push($errors , 'Hay que poner el Codigo Postal Obligatirio');
                }else {
                    $user->zipcode = $postcode;
                }
            }

            if($user->country != $country){
                if($country == ''){
                    array_push($errors , 'Hay que poner el Pasis Obligatirio');
                }else {
                    $user->country = $country;
                }
            }
        }


        if(count($errors) > 0 ){
            $data = [
                'titulo' => 'Carrito | Checkout',
                'subtitle' => 'Checkout | Iniciar session',
                'menu' => true,
                'data' => $user,
                'errors' => $errors,
            ];
            $this->view('carts/address' , $data);
        }else {
            $session->login($user);


            $data = [
                'titulo' => 'Carrito | Forma de Pago',
                'subtitle' => 'Checkout | Forma de Pago',
                'menu' => true,
            ];

            $this->view('carts/paymentmode' , $data);
        }
    }

    public function verify()
    {
        $session = new Session();
        $user = $session->getUser();
        $cart = $this->model->getCart($user->id);
        $payment = $_POST['payment'] ?? '';

        $data = [
            'titulo' => 'Carrito | Verificar los datos',
            'menu' => true,
            'payment' => $payment,
            'user' => $user,
            'data' => $cart,
        ];

        $this->view('carts/verify' , $data);
    }

    public function thanks()
    {
        // Comprobar si la sesión existe
        // Comprobar si estamos logueados

        $session = new Session();
        $user = $session->getUser();

        if($this->model->closeCart($user->id, 1)) {
            $data = [
                'titulo' => 'Carrito | Gracias por su compra',
                'data' => $user,
                'menu' => true,
            ];

            $this->view('carts/thanks', $data);
        } else {
            $data = [
                'titulo' => 'Carrito | Gracias por su compra',
                'menu' => true,
                'subtitle' => 'Error en la actualización de los productos del carrito',
                'text' => 'Existió un problema al actualiza el estaod del carrito. 
                            Por favor pruebe más tarde o comuniquese con nuestro servcio de soporte',
                'color' => 'alert-danger',
                'url' => 'shop',
                'coloButton' => 'btn-danger',
                'textButton' => 'Regresar',
            ];

            $this->view('mensaje', $data);
        }
    }

}