<?php

class overzicht extends BaseController
{
    // private $lessenmodel;

    // public function __construct()
    // {
    //     $this->lessenmodel = $this->model('LessenModel');
    // }

    public function __construct(){}

    public function index()
    {
        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen met de informatie uit het $data-array
         */
        $this->view('overzicht/index');
    }

    
}