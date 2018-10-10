<?php

/**
 * Description of Signup
 *
 * @author union
 */
class Signup extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->js = ['public/js/signup.js', 'public/js/index.js'];
    }
    
    public function index() {
        $this->view->title = 'Signup';
        $this->view->render('header');
        $this->view->render('signup/index');
        $this->view->render('index/index');
        $this->view->render('footer');
        
    }
    
    public function checkIfEmailExist() {
        $this->model->checkIfEmailExist();
    }
    
    public function processSignup() {
        $data = [
            'email' => $_POST['email'],
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'password' => $_POST['password']
        ];
        
        $this->model->processSignup($data);
    }

}
