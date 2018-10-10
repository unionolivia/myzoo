<?php

class GalleriaModel extends Model {

    function __construct() {
        
        parent::__construct();        
    }
    
        public function galleryList() {
        $id = $_POST['id'];
        $data = $this->db->select('SELECT * FROM gallery WHERE animal_id = :animalId', ['animalId' => $id]);
        echo json_encode($data);
    }

}
