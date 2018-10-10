<?php

class Ticket extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->js = ['public/js/jquery.dataTables.min.js', 'public/js/jquery.redirect.js', 'public/js/ticket.js', 'public/js/profile.js'];
        $this->view->css = ['public/css/jquery.dataTables.min.css'];
        Auth::handleLogin();
        $this->view->email = $_SESSION['email'];
        $this->view->firstname = $_SESSION['firstname'];
        $this->view->lastname = $_SESSION['lastname'];
    }

    public function index() {
        $this->view->title = 'Ticket';
        $this->view->render('header');
        $this->view->render('ticket/index');
        $this->view->render('dashboard/index');
        $this->view->render('profile/index');
        $this->view->render('footer');
    }
    
    public function generateTicket() {
        $data = [
            'number' => $_POST['number']
        ];
        
        $this->model->generateTicket($data);
        
    }
    
    public function getAllTicket() {
        $this->model->getAllTicket();
    }

}
