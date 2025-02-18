<?php

class overzicht extends BaseController{

    private $model;
    private $week;
    private $data;

    public function __construct()
    {
        $this->model = $this->model('lesoverzichtModel');
        $this->week = date('W');
    }
    public function index()
    {
        $weekNumber = (isset($_GET['week'])) ? $_GET['week'] : date('W');

        $this->data = [
            'lessen' => $this->model->getLessen(['week' => $weekNumber]),
            'week' => $this->getweek($weekNumber),
            'weekNumber' => $weekNumber,
            'error' => ($this->week > $weekNumber) ? 'Deze lessen zijn al geweest!' : ''
        ];
        $this->view('overzicht/index', $this->data);
    }

}