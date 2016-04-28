<?php

//creo la conexión con la BBDD antes incorporo las variables

require_once "config.php";

class bbdd {

    protected $_db;

    public function __construct() {
        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->_db->connect_errno) {
            echo "Fallo al conectar a MySQL: " . $this->_db->connect_errno;
            return;
        }

        $this->_db->set_charset(DB_CHARSET);
    }

}
