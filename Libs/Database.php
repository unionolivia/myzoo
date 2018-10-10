<?php

class Database extends PDO {

    /**
     * 
     * @param type $DRIVER
     * @param type $DB_HOST
     * @param type $DB_NAME
     * @param type $DB_USER
     * @param type $DB_PASS
     */
    function __construct($DRIVER, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
        parent::__construct($DRIVER . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function select($sql, $array = [], $fetch = '', $fetchMode = PDO::FETCH_ASSOC) {
        $stmt = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        switch ($fetch) {
            case 'fetch':
                return $stmt->fetch($fetchMode);
                break;
            default:
                return $stmt->fetchAll($fetchMode);
        }
        
    }
    
    /**
     * insert
     * @param string $table   A name of a table to insert into
     * @param string $data    An Associative Array
     */
    public function insert($table, $data) {
        ksort($data);
        $fieldNames = implode(' , ', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

//        echo "INSERT INTO $table ('$fieldNames') VALUES ($fieldValues)";
//        die();

        $stmt = $this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
    }
    
    /**
     * update
     * @param string $table   A name of a table to update
     * @param string $data    An Associative Array
     * @param string $where   The WHERE QUERY PART
     */
    public function update($table, $data, $where) {
        ksort($data);
        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "$key=:$key,";
        }

        $fieldDetails = rtrim($fieldDetails, ',');

        $stmt = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
    }


}
