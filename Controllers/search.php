<?php

class Search extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = ['public/js/search.js', 'public/js/masonry.pkgd.min.js', 'public/js/imagesloaded.pkgd.min.js', 'public/js/jquery.redirect.js', 'public/js/profile.js', 'public/js/tinymce/tinymce.min.js'];
        $this->view->email = $_SESSION['email'];
        $this->view->firstname = $_SESSION['firstname'];
        $this->view->lastname = $_SESSION['lastname'];
    }

    public function index() {
        $this->view->title = 'Search Result';
        $this->view->render('header');
        $this->view->animalId = $_POST['animalId'];
        $this->view->render('search/index');
        $this->view->render('dashboard/index');
        $this->view->render('profile/index');
        $this->view->render('footer');
    }
    
    public function searchResult() {
        $this->model->searchResult();
    }
 

}
