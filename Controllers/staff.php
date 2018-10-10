<?php
class Staff extends Controller {

    function __construct() {
        parent::__construct();  
        Auth::handleLogin();
        $this->view->js = ['public/js/profile.js', 'public/js/staff.js', 'public/js/jquery.redirect.js'];
        $this->view->css = [];
        $this->view->email = $_SESSION['email'];
        $this->view->firstname = $_SESSION['firstname'];
        $this->view->lastname = $_SESSION['lastname'];
    }

    public function index() {
        
        $this->view->title = 'Welcome staff';
        $this->view->render('header');
        $this->view->render('staff/index');
        $this->view->render('profile/index');
        $this->view->render('footer');
    }
    
      public function verifyTicket() {
        
        $this->model->verifyTicket();
    }

}

