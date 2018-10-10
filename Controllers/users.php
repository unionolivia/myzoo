<?php

class Users extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->js = ['public/js/jquery.dataTables.min.js', 'public/js/users.js', 'public/js/profile.js', 'public/js/jquery.redirect.js'];
        $this->view->css = ['public/css/jquery.dataTables.min.css'];
        Auth::handleLogin();
        $this->view->email = $_SESSION['email'];
        $this->view->firstname = $_SESSION['firstname'];
        $this->view->lastname = $_SESSION['lastname'];
    }

    public function index() {
        
        $this->view->title = 'Users';
        $this->view->render('header');
        $this->view->render('users/index');
        $this->view->render('profile/index');
        $this->view->render('footer');
    }
    
    public function edit() {

        $this->view->title = 'Edit users';
        $this->view->js = ['public/js/editusers.js'];
        $this->view->render('header');
        $this->view->id = $_POST['id'];
        $this->view->name = $_POST['name'];
        $this->view->render('users/edit');
        $this->view->render('footer');
    }
    
    public function getAllUsers() {
        
        $this->model->getAllUsers();
    }
    
    public function updateUsersRole() {
        $data = [];
        $data['userid'] = $_POST['userid'];
        $data['role'] = $_POST['role'];
        
        
        $this->model->updateUsersRole($data);
        
    }


}
