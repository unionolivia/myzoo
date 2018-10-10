<?php

class Index extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->js = ['public/js/index.js'];
    }

    public function index() {
        $this->view->title = 'Welcome to Zoo';
        $this->view->render('header');
//        $this->view->msg = 'This is the Homepage';
        $this->view->render('index/index');
        $this->view->render('footer');
    }


}
