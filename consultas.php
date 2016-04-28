<?php

require_once "bbdd.php";

class consultas extends bbdd {

    public function __construct() {
        parent::__construct();
    }

    public function ejecutar($sql) {
        $result = $this->_db->query($sql);

        $usuarios = $result->fetch_all(MYSQLI_ASSOC);
        return $usuarios;
    }

}
