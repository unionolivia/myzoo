<?php

class StaffModel extends Model {

    public $result = [];

    public function __construct() {
        parent::__construct();
    }

    public function verifyTicket() {
        $ticket = $_POST['ticket'];

        $data = $this->db->select('SELECT * FROM ticket WHERE ticket_no = :ticket_no', ['ticket_no' => $ticket], 'fetch');
        if (!empty($data)) {

            $this->result['message'] = TRUE;
        } else {
            $this->result['message'] = FALSE;
        }

        echo json_encode($this->result);
    }

}
