<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AnimalModel extends Model {

    public $result = [];

    function __construct() {
        parent::__construct();
    }

    public function addAnimal($data) {
        $postData = [
            'name' => $data['name'],
            'description' => $data['description']
        ];

        if (!empty($postData)) {
            $this->db->insert('animal', $postData);

            $this->result['message'] = TRUE;
        } else {
            $this->result['message'] = FALSE;
        }

       echo json_encode($this->result);
    }

    public function listAnimals() {
        $data = $this->db->select('SELECT * FROM animal');
        echo json_encode($data);
    }

}
