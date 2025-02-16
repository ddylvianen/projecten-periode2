<?php

class BaseController
{
    /**
     * Hier maken we een nieuw model object aan en geven deze 
     * terug aan de controller
     */
    public function model($model)
    {
        require_once APPROOT . '/models/' . $model . '.php';
        return new $model();
    }

    /**
     * De view method laadt het view-bestand en geeft informatie
     * mee aan de view met het $data-array
     */
    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php'))
        {
            require_once('../app/views/' . $view . '.php');
        } else {
            echo 'View bestaat niet';
        }
    }

    public function redirect($page)
    {
        header('location: ' . URLROOT . '/' . $page);
    }

    public function sendmail($to, $subject, $message)
    {
        mail($to, $subject, $message);
    }
    
    
    public function senddata($data)
    {
        echo json_encode($data);
    }


    public function isLoggedIn()
    {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('users/login');
        }
    }

    public function loggedinAS($role)
    {
        if ($_SESSION['role'] != $role) {
            $this->redirect('homepages/index');
        }
    }

}