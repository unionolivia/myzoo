<?php

/**
 * Description of Login
 *
 * @author union
 */
class LoginModel extends Model {

    //put your code here

    public function __construct() {
        parent::__construct();
    }

    public function checkIfEmailExist() {
        $email = $_POST['email'];
        $this->result = [];
        $data = $this->db->select('SELECT email, password, image FROM person WHERE email = :email', ['email' => $email], 'fetch');
        if (!empty($data)) {
            $email = $data['email'];
            $password = $data['password'];
            $userPhoto = $data['image'];
            $this->result['message'] = TRUE;
            $this->result['email'] = $email;
            $this->result['password'] = $password;
            $this->result['image'] = $userPhoto;
            
        } else {
            $this->result['message'] = FALSE;
        }

        echo json_encode($this->result);
    }

    public function checkIfEmailExistWithPassword() {
        $email = $_POST['email'];
        $password = Hash::create('haval256,4', $_POST['currentPassword'], HASH_PASSWORD_KEY);

        $this->result = [];
        $data = $this->db->select('SELECT password, firstname, lastname, role FROM person WHERE email = :email AND password = :password', ['email' => $email, 'password' => $password], 'fetch');
        if (!empty($data)) {
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $role = $data['role'];

            Session::init();
            Session::set('loggedIn', TRUE);
            Session::set('email', $email);
            Session::set('firstname', $firstname);
            Session::set('lastname', $lastname);
            
            switch ($role) {
                case 'admin':

                    Session::set('role', 'admin');
                    $this->result['message'] = 'a';
                    break;

                case 'staff':
                    Session::set('role', 'staff');
                    $this->result['message'] = 's';
                    break;

                default:

                    Session::set('role', 'default');
                    $this->result['message'] = 'd';
                    break;
            }
        } else {
            $this->result['message'] = FALSE;
        }

        echo json_encode($this->result);
    }
    
    public function getAnimalDetails() {
        $data = $this->db->select('SELECT description, cover_photo, name FROM animal ORDER BY cover_photo');
        echo json_encode($data);
    }

}
