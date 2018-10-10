<?php

class GalleryModel extends Model {

    public $result = [];

    function __construct() {
        parent::__construct();
    }

    public function animalList() {

//        $data = $_POST['animalId'];
//        echo $data;
    }

    public function process($data) {

        $data = [
            'animal_id' => $data['animalId'],
            'image' => $data['image'],
            'dimension' => $data['dimension'],
            'types' => 'pic'
        ];
        if (!empty($data)) {
            $this->db->insert('gallery', $data);
        } else {
            die();
        }
    }

    public function galleryList() {
        $id = $_POST['id'];
        $data = $this->db->select("SELECT * FROM gallery WHERE types = 'pic' AND animal_id = :animalId", ['animalId' => $id]);
        echo json_encode($data);
    }

    public function galleryVideo() {
        $id = $_POST['id'];
        $data = $this->db->select("SELECT * FROM gallery WHERE types = 'vid' AND animal_id = :animalId", ['animalId' => $id]);
        echo json_encode($data);
//        return $data;
    }

    public function updateEachAnimalDetails($data) {
        $postData = [
            'title' => $data['title'],
            'description' => $data['descp']
        ];

        if (!empty($postData)) {
            $this->db->update('gallery', $postData, "gallery_id = '{$data['gallery_id']}'");
            $this->result['message'] = TRUE;
        } else {
            $this->result['message'] = FALSE;
        }

        echo json_encode($this->result);
    }

    public function UpdateEachAnimalInItsGallery($data) {
        $postData = [
            'title' => $data['title'],
            'description' => $data['descp']
        ];

        if (!empty($postData)) {
            $this->db->update('gallery', $postData, "gallery_id = '{$data['gallery_id']}'");
            $this->result['message'] = TRUE;
        } else {
            $this->result['message'] = FALSE;
        }

        echo json_encode($this->result);
    }

    public function updateAnimalImage($data) {
        $postData = [
            'cover_photo' => $data['image']
        ];

        if (!empty($postData)) {
            $this->db->update('animal', $postData, "animal_id = '{$data['animal_id']}'");
            $this->result['message'] = TRUE;
        } else {
            $this->result['message'] = FALSE;
        }

        echo json_encode($this->result);
    }

    public function processVideo($data) {
        $data = [
            'animal_id' => $data['animalId'],
            'image' => $data['image'],
            'types' => 'vid'
        ];
        if (!empty($data)) {
            $this->db->insert('gallery', $data);          
        } else {
            die();
        }
    }

}
