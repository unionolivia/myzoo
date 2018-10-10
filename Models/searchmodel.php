<?php

class SearchModel extends Model {

    public $result = [];

    function __construct() {
        parent::__construct();
    }

    public function searchResult() {
        $id = $_POST['id'];
        $data = $this->db->select("SELECT * FROM animal WHERE animal_id = :animalId", ['animalId' => $id]);
        echo json_encode($data);
    }

}
