<?php

class Gallery extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = ['public/js/gallery.js', 'public/js/jquery.redirect.js', 'public/js/profile.js', 'public/js/tinymce/tinymce.min.js'];
        $this->view->email = $_SESSION['email'];
        $this->view->firstname = $_SESSION['firstname'];
        $this->view->lastname = $_SESSION['lastname'];
    }

    public function index() {
        $this->view->title = 'Gallery';
        $this->view->render('header');
//        $this->model->animalList();        
        $this->view->animalId = $_POST['animalId'];
        $this->view->animalName = $_POST['animalName'];
        $this->view->render('gallery/index');
        $this->view->render('dashboard/index');
        $this->view->render('profile/index');
        $this->view->render('footer');
    }

    public function process() {
        $data = [];
        $data['animalId'] = $_POST['animalId'];

        $files = [];
        foreach ($_FILES['files'] as $k => $l) {
            foreach ($l as $i => $v) {
                if (!array_key_exists($i, $files))
                    $files[$i] = [];
                $files[$i][$k] = $v;
            }
        }

        require 'Libs/Upload.php';
        foreach ($files as $file) {

            $this->uploader = new Upload($file);
            if ($this->uploader->uploaded) {


                // get the filename and store in $file
                $fileName = $this->uploader->file_src_name_body;

                $this->uploader->file_new_name_body = $fileName;
                $this->uploader->file_overwrite = TRUE;
                $this->uploader->image_ratio = TRUE;

//                $data['image'] = "{$fileName}.{$this->uploader->file_src_name_ext}";
//                $data['dimension'] = "{$this->uploader->image_src_x}x{$this->uploader->image_src_y}";

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


            $this->model->process($data);
        }

        header('location: ' . URL . 'gallery');
    }

    public function updateEachAnimalDetails() {
        $data = [];
        $data['gallery_id'] = $_POST['gallery_id'];
        $data['title'] = $_POST['title'];
        $data['descp'] = $_POST['descp'];


        $this->model->updateEachAnimalDetails($data);
    }

    public function updateAnimalImage() {
        $data = [];

        $data['animal_id'] = $_POST['animalID'];
        $data['image'] = $_POST['image'];


        $this->model->updateAnimalImage($data);
    }

    public function UpdateEachAnimalInItsGallery() {
        $data = [];
        $data['gallery_id'] = $_POST['gallery_id'];
        $data['title'] = $_POST['title'];
        $data['descp'] = stripslashes(trim($_POST['descp'], '\/()'));
        
        $this->model->UpdateEachAnimalInItsGallery($data);
    }

    public function galleryList() {
        $this->model->galleryList();
    }

    public function galleryVideo() {
        $this->model->galleryVideo();
    }

    public function editAndUpdateEachAnimal() {
        $data = [];
        $data['gallery_id'] = $_POST['gallery_id'];
        $data['title'] = $_POST['title'];
        $data['descp'] = $_POST['descp'];

        $this->model->editAndUpdateEachAnimal($data);
    }

    public function processVideo() {
        $data = [];
        $data['animalId'] = $_POST['animalId'];
           

        // Let's get the video file
        $file = $_FILES['video'];

        require 'Libs/Upload.php';
        $this->uploader = new Upload($file);

        if ($this->uploader->uploaded) {


            // get the filename and store in $file
            $fileName = $this->uploader->file_src_name_body;
            $this->uploader->file_overwrite = TRUE;
            $this->uploader->file_max_size = '2000000024'; // 1KB

            $this->uploader->file_new_name_body = $fileName;

            $this->uploader->process('public/image/pic/');

            if (!$this->uploader->processed) {
                throw new Exception($this->uploader->error);
            }

            $data['image'] = "{$fileName}.{$this->uploader->file_src_name_ext}";
            // $data['dimension'] = "{$this->uploader->image_src_x}x{$this->uploader->image_src_y}";

            $this->uploader->clean();
        } else {
            throw new Exception($this->uploader->error);
        }

        $this->model->processVideo($data);
    }

}
