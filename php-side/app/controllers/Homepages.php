<?php

class Homepages extends BaseController
{

    public function index()
    {
        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */


        $data = [
            'title' => 'Homepagina!',
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen met de informatie uit het $data-array
         */
        $this->view('homepages/index', $data);
    }

    
}