<?php

class Galleria extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = ['public/js/galleria.js', 'public/js/profile.js', 'public/js/jquery.redirect.js'];
        $this->view->email = $_SESSION['email'];
        $this->view->firstname = $_SESSION['firstname'];
        $this->view->lastname = $_SESSION['lastname'];
    }

    public function index() {
        $this->view->title = 'Galleria';
        $this->view->render('header');
        $this->view->animalId = $_POST['animalId'];
        $this->view->animalName = $_POST['animalName'];
        $this->view->render('galleria/index');
        $this->view->render('profile/index');
        $this->view->render('footer');
    }

    public function galleryList() {
        $this->model->galleryList();
    }

}
