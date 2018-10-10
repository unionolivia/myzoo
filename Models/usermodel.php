<?php

class UserModel extends Model {

    public $result = [];

    public function __construct() {
        parent::__construct();
    }

    public function verifyTicket() {
        $ticket = $_POST['ticket'];

        $data = $this->db->select('SELECT status FROM ticket WHERE ticket_no = :ticket_no', ['ticket_no' => $ticket], 'fetch');
        if (!empty($data)) {
            $status = $data['status'];

            switch ($status) {
                case 'UNUSED':
                    $postData = [
                        'status' => 'USE'
                    ];
                    $this->db->update('ticket', $postData, "ticket_no = {$ticket}");
                    $this->result['message'] = 'u';
                    break;

                case 'USE':
                    $postData = [
                        'status' => 'USED'
                    ];
                    $this->db->update('ticket', $postData, "ticket_no = {$ticket}");
                    $this->result['message'] = 'use';
                    break;

                case 'USED':
                    $this->result['message'] = 'used';
                    break;

                default:
                    break;
            }
        } else {
            $this->result['message'] = FALSE;
        }

        echo json_encode($this->result);
    }


//    private $_id;
//    private $_email;
//    private $_password;
//    private $_phoneNumber;
//    private $_profilePhotoUrl;
//    private $_dateRegistered;
//
//
//    public function __construct() {
//        
//    }
//
//    public function getId() {
//        return $this->_id;
//    }
//
//    public function setId($id) {
//        $this->_id = $id;
//    }
//
//   
//    public function getProfilePhotoUrl() {
//        return $this->_profilePhotoUrl;
//    }
//
//    public function setProfilePhotoUrl($profilePhotoUrl) {
//        $this->profilePhotoUrl = $profilePhotoUrl;
//    }
//
//    public function getHashedPassword() {
//        return $this->_password;
//    }
//
//    public function setHashedPassword($password) {
//        $this->_password = $password;
//    }
//
//    public function getEmail() {
//        return $this->_email;
//    }
//
//    public function setEmail($email) {
//        $this->_email = $email;
//    }
//
//    public function getPhoneNumber() {
//        return $this->_phoneNumber;
//    }
//
//    public function setPhoneNumber($phoneNumber) {
//        $this->_phoneNumber = $phoneNumber;
//    }
//
//    public function getDateRegistered() {
//        return $this->_dateRegistered;
//    }
//
//    public function setDateRegistered($dateRegistered) {
//        $this->_dateRegistered = $dateRegistered;
//    }
//    
//    
}
