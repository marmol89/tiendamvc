<?php

class BooksController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('Book');
    }

    public function index()
    {
        $session = new Session();

        if($session->getLogin()) {

            $books = $this->model->getCourses();

            $data = [
                'titulo' => 'Libros',
                'menu' => true,
                'data' => $books,
                'active' => 'books',
            ];

            $this->view('books/index', $data);

        } else {
            header('location' . ROOT);
        }
    }
}