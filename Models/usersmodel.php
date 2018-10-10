<?php

class UsersModel extends Model {

    public $result = [];

    function __construct() {
        parent::__construct();
    }

    public function getAllUsers() {
        $data = $this->db->select('SELECT * FROM person');
        echo json_encode($data);
    }

    public function updateUsersRole($data) {
        $postData = [
            'role' => $data['role']
        ];

        $this->db->update('person', $postData, "person_id = {$data['userid']}");
        $this->result['message'] = TRUE;
        echo json_encode($this->result);
    }

}
