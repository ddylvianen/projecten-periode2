<?php

use Vtiful\Kernel\Format;

class reservering extends BaseController
{

    private $model;
    private $week;
    private $data;

    public function __construct()
    {
        $this->model = $this->model('reserveringModel');
        $this->week = date('W');
    }
    public function index()
    {
        $weekNumber = (isset($_GET['week'])) ? $_GET['week'] : date('W');

        $this->data = [
            'lessen' => $this->model->getReserveringen(['week' => $weekNumber]),
            'week' => $this->getweek($weekNumber),
            'weekNumber' => $weekNumber,
            'error' => ($this->week > $weekNumber) ? 'Deze lessen zijn al geweest!' : ''
        ];
        $this->view('reservering/index', $this->data);
        $this->view('reservering/index', $this->data);
    }

    private function getweek($weekNumber){

        $begindatestr = date('Y') . 'W' . str_pad($weekNumber, 2, '0', STR_PAD_LEFT);
        $enddatestr = date('Y') . 'W' . str_pad($weekNumber, 2, '0', STR_PAD_LEFT) . '7';

        $month = date('F', strtotime($enddatestr));

        $week_start = date('d', strtotime($begindatestr));
        $week_end = date('d', strtotime($enddatestr));

        return "{$week_start} - {$week_end} {$month}";
    }

}