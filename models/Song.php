<?php
    /* 
        Author:Nelson G Katale
        Date:31/3/2019
    */
    require_once('../../config.php');
    require_once(ROOT_PATH.'/config/Database.php');

    class Song extends Database {

        //database stuff
        private $conn;
        private $table = 'song';
        
        public function __construct()
        {
            parent::__construct();
        }
        
        public function getPlayList()
        {
            $stmt = 'SELECT 
                            s.id AS 
                            song_id,s.title AS 
                            title,a.artist_name AS 
                            artist_name, genre,length FROM song AS s 
                            LEFT JOIN artist AS a ON 
                            s.song_id = a.artist_id';
            
            $result = $this->query($stmt);
            return $result;
        }
    }