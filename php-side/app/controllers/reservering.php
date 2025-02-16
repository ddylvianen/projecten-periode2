<?php

class reservering extends BaseController
{

    private $model;

    public function __construct()
    {
        $this->model = $this->model('reserveringModel');
    }
    public function index()
    {
        $data = $this->model->getReserveringen();

        $this->view('reservering/index', $data);
    }


}