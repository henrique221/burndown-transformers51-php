<?php

class Controller
{
    protected $post = null;
    protected $model = null;
    protected $view = null;

    public function __construct()
    {
        $this->post = $_POST;
        $this->model = new Model();
        $this->view = new View();
    }

    public function redirect($target)
    {
        header("Location" . BASE_URL . $target);
        die;
    }
}