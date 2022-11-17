<?php

class ErrorController extends Controller
{
    public function index() {

        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $urlST= trim($_SERVER['REQUEST_URI'], '/');
        $urlST = filter_var($urlST, FILTER_SANITIZE_URL);
        $urlST = explode('/', $urlST);


        $data = [
            'url' => $url,
            'back' => $urlST[0],
        ];

        $this->view('error/index' , $data);
    }

}