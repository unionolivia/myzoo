<?php

class Animal extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->js = ['public/js/animal.js', 'public/js/profile.js'];
        Auth::handleLogin();
        $this->view->email = $_SESSION['email'];
        $this->view->firstname = $_SESSION['firstname'];
        $this->view->lastname = $_SESSION['lastname'];
    }

    public function index() {
        $this->view->title = 'Animals';
        $this->view->render('header');
        $this->view->render('animal/index');
        $this->view->render('dashboard/index');
        $this->view->render('profile/index');
        $this->view->render('footer');
    }
    
    public function addAnimal() {
        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description']
        ];
        
        $this->model->addAnimal($data);
        
    }

}
