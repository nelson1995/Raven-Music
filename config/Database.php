<?php
    /* 
        Author:Nelson G Katale
        Date:31/3/2019
    */
    class Database extends mysqli {
        private static $instance = null;
        private $host = 'localhost';
        private $uname = 'root';
        private $passcode = '';
        private $db_name = 'music_library';

        public function __construct() 
        {
            parent::__construct($this->host,$this->uname,$this->passcode,$this->db_name);
            if (mysqli_connect_error()) 
            {
                die('Failed to connect !'.mysqli_connect_error());
            }
            parent::set_charset('utf-8');
        }
    }