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
        /**
         * Je roept de method getAllSmartphones aan van de smartphoneModel class
         */
        // $this->lessenmodel->getAllLessen();

        $data = [
            'title' => 'Smartphones',
            'smartphones' => '1'
        ];


        $this->view('lessen/index', $data);
    }
}