<?php

class Lessen extends BaseController
{
    private $lessenmodel;

    public function __construct()
    {
        
        $this->lessenmodel = $this->model('lessenModel');
    }

    public function index()
    {
        
        $lessen = $this->lessenmodel->getAllLessen();

        $data = [
            'title' => 'Lessen Overzicht',
            'lessen' => $lessen
        ];

        $this->view('lessen/index', $data);
    }
    
}
