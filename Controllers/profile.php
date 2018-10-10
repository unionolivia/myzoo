<?php

class Profile extends Controller {

    public $email = null;

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    public function index() {
        
    }

    public function updateProfile() {
        $this->model->updateProfile();
    }

    public function updateUser() {
        $data = [];
        $data['email'] = $_POST['email'];
        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];


        $this->model->updateUser($data);
    }

}
