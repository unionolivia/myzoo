<?php
class Model {

    function __construct() {
        $this->db = new Database(DRIVER, DB_HOST, DB_NAME, DB_USER, DB_USER);
    }

}