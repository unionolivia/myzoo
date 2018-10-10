<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TicketModel extends Model {

    public $result = [];

    function __construct() {
        parent::__construct();
    }

    public function generateTicket($data) {
        
        $length = $data['number'];
        
        for ($i = 0; $i < $length; $i++) {
            $num = mt_rand(0, 100000);
            $data = [
                'ticket_no' => $num,
                'status' => 'UNUSED'
            ];

           
             $this->db->insert('ticket', $data);
        }
        
        


        $this->result['message'] = TRUE;
        echo json_encode($this->result);
    }
    
    public function getAllTicket() {
         $data = $this->db->select('SELECT * FROM ticket');
        echo json_encode($data);
    }

}
