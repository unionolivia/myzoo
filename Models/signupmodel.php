<?php

class SignupModel extends Model {

    public $result = [];

    function __construct() {
        parent::__construct();
    }

    public function checkIfEmailExist() {
        $email = $_POST['email'];
        $data = $this->db->select('SELECT email FROM person WHERE email = :email', ['email' => $email], 'fetch');
        if (!empty($data)) {
            $this->result['message'] = TRUE;
        } else {
            $this->result['message'] = FALSE;
        }

        echo json_encode($this->result);
    }

    public function processSignup($data) {
        $data = [
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::create('haval256,4', $data['password'], HASH_PASSWORD_KEY)
        ];

        if ($data) {
            $this->db->insert('person', $data);
            $this->result['message'] = TRUE;
            Session::init();
            Session::set('role', 'default');
            Session::set('loggedIn', TRUE);
            Session::set('email', $data['email']);
            Session::set('firstname', $data['firstname']);
            Session::set('lastname', $data['lastname']);
        } else {
            $this->result['message'] = FALSE;
        }

        echo json_encode($this->result);
    }

}
