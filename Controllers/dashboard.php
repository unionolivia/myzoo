<?php

class Dashboard extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = ['public/js/dashboard.js', 'public/js/jquery.redirect.js', 'public/js/profile.js'];
        $this->view->css = ['public/css/sidebar.css'];
        $this->view->email = $_SESSION['email'];
        $this->view->firstname = $_SESSION['firstname'];
        $this->view->lastname = $_SESSION['lastname'];
    }

    public function index() {

        $this->view->title = 'Welcome to Dashboard';
        $this->view->render('header');
//        $this->view->animalList = $this->model->animalList();
        $this->view->render('dashboard/index');
        $this->view->render('profile/index');
        $this->view->render('footer');
    }

    public function animalList() {
        $this->model->animalList();
    }

    public function process() {
        $data = [];
        $data['email'] = $_POST['email'];
        
        require 'Libs/Upload.php';
        $this->uploader = new Upload($_FILES['file']);

        if ($this->uploader->uploaded) {

            // get the filename and store in $file
            $fileName = $this->uploader->file_src_name_body;

            $this->uploader->file_new_name_body = $fileName;
            $this->uploader->file_overwrite = TRUE;
            $this->uploader->image_resize = TRUE;
            $this->uploader->image_x = 200;
            $this->uploader->image_y = 200;
            $this->uploader->image_ratio = TRUE;


            $this->uploader->process('public/image/pic/');

            if (!$this->uploader->processed) {
                throw new Exception($this->uploader->error);
            }

            $data['image'] = "{$fileName}.{$this->uploader->file_src_name_ext}";
            $data['dimension'] = "{$this->uploader->image_src_x}x{$this->uploader->image_src_y}";

            $this->uploader->clean();
        } else {
            throw new Exception($this->uploader->error);
        }

//         Validation, here!


        $this->model->process($data);
    }
    
    public function profile() {
        $this->model->profile();
    }

    public function searchOnTheSite(){
        $this->model->searchOnTheSite();
        
    }

        public function logout() {
        Session::destroy();
        header('location: ' . URL);
        exit();
    }

}
