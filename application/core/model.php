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

    }

    public function validateModel($model)
    {
        
    }
}