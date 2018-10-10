<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DashboardModel extends Model {

    function __construct() {
        parent::__construct();
    }

//    public function animalList($animal_id = NULL) {
//        switch (isset($animal_id)) {
//            case 1:
//                return $this->db->select('SELECT animal_id, name, description FROM animal WHERE animal_id = :animal_id', ['animal_id' => $animal_id], 'fetch');
//                break;
//
//            default :
//                return $this->db->select('SELECT * FROM animal WHERE animal_id = :animal_id', ['animal_id' => $animal_id]);
//                break;
//        }
//    }

    public function animalList() {
        $data = $this->db->select('SELECT * FROM animal');
        echo json_encode($data);
    }

    public function process($data) {

        $postData = [
            'image' => $data['image'],
            'dimension' => $data['dimension']
        ];
        if (!empty($postData)) {
            $this->db->update('person', $postData, "email = '{$data['email']}'");
            echo '<img src="public/image/pic/' . $data['image'] . '" alt="" class="circle responsive-img">';
        } else {
            echo '<img src="public/image/pic/avatar.png" alt="" class="circle responsive-img">';
        }
    }

//    public function getAnimalId() {
//        $animalId = (int) $_POST['animalId'];
//        echo $animalId;        
//        die();
//    }

    public function profile() {
        $email = $_POST['email'];
        $data = $this->db->select('SELECT firstname, lastname, image FROM person WHERE email = :email', ['email' => $email]);
        echo json_encode($data);
    }

    public function searchOnTheSite() {
        $stringSearch = $_POST['string'];
        $data = $this->db->select("SELECT * FROM animal WHERE name like '%{$stringSearch}%' || description like '%{$stringSearch}%' ");

        echo json_encode($data);

    }

}
