<?php

class ProfileModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function updateProfile() {
        $email = $_POST['email'];

        $data = $this->db->select('SELECT firstname, lastname FROM person WHERE email = :email', ['email' => $email]);
        echo json_encode($data);
    }

    public function updateUser($data) {
        $postData = [
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname']
        ];

        if (!empty($postData)) {
            $this->db->update('person', $postData, "email = '{$data['email']}'");
            $this->result['message'] = TRUE;
        } else {
            $this->result['message'] = FALSE;
        }

        echo json_encode($this->result);
    }

}
