<?php

class User extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = ['public/js/profile.js', 'public/js/user.js'];
        $this->view->email = $_SESSION['email'];
        $this->view->firstname = $_SESSION['firstname'];
        $this->view->lastname = $_SESSION['lastname'];
    }

    public function index() {
        $this->view->title = 'Welcome to Myzoo';
        $this->view->render('header');
        $this->view->render('user/index');
        $this->view->render('profile/index');
        $this->view->render('footer');
    }

    public function animal() {
      
        $this->view->title = 'These are my animals';
        
        $this->view->email = $_SESSION['email'];
        $this->view->firstname = $_SESSION['firstname'];
        $this->view->lastname = $_SESSION['lastname'];
        $this->view->render('header');
        $this->view->render('user/animal');
        $this->view->render('profile/index');
        $this->view->render('footer');
    }

    public function verifyTicket() {

        $this->model->verifyTicket();
    }

}
