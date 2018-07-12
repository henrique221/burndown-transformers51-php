<?php

class Model
{
    private $modelPath = APP_PATH . 'models//';
    protected $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function load($model)
    {
        if(!$this->validateModel($model)) {
            die('UNABLE TO FIND ' . $model . ' MODEL');
        }
    }

    private function validateModel($model)
    {
        if(!file_exists($this->modelPath . strtolower($model . '.php'))) return false;
        include $this->modelPath . strtolower($model) . '.php';
        if(!class_exists($model)) return false;
        return true;
    }
}