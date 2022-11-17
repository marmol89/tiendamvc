<?php

class ErrorController extends Controller
{
    public function index() {

        $urlST= trim($_SERVER['REQUEST_URI'], '/');
        $urlST = filter_var($urlST, FILTER_SANITIZE_URL);
        $urlST = explode('/', $urlST);


        $data = [
            'back' => $urlST[0],
        ];

        $this->view('error/index' , $data);
    }

}