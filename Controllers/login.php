<?php

class Login extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->js = ['public/js/login.js', 'public/js/index.js'];
    }

    public function index() {
        $this->view->title = 'Login';
        $this->view->render('header');
        $this->view->render('login/index');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

    public function checkIfEmailExist() {
        $this->model->checkIfEmailExist();
    }

    public function checkIfEmailExistWithPassword() {
        $this->model->checkIfEmailExistWithPassword();
    }
    
        public function getAnimalDetails() {
        $this->model->getAnimalDetails();
    }

}
