<?php

class DisplayModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function getAnimalDetails() {
        $data = $this->db->select('SELECT * FROM animal ORDER BY cover_photo');
        echo json_encode($data);
    }

}
