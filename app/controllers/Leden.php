<?php

class LedenOverzicht extends BaseController
{
    private $lidModel;

    public function __construct()
    {
        $this->lidModel = $this->model('LidModel');
    }

    public function index()
    {
        $results = $this->lidModel->getAllLeden();
        
        $data = [
            'title' => 'Ledenoverzicht',
            'leden' => $results
        ];

        $this->view('ledenoverzicht/index', $data);
    }
}