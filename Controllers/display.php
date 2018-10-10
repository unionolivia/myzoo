<?php

class Display extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = ['public/js/profile.js', 'public/js/jquery.redirect.js', 'public/js/display.js'];
        $this->view->email = $_SESSION['email'];
        $this->view->firstname = $_SESSION['firstname'];
        $this->view->lastname = $_SESSION['lastname'];
    }

    public function index() {
        $this->view->title = 'Animal Details';
        $this->view->render('header');
        $this->view->render('display/index');
        $this->view->render('profile/index');
        $this->view->render('footer');
    }

    public function getAnimalDetails() {
        $this->model->getAnimalDetails();
    }

}
