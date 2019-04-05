<?php
    /* 
        Author:Nelson G Katale
        Raven Music API
        Date:31/3/2019
    */
    require_once('../../config.php');
    require_once(ROOT_PATH.'/config/Database.php');

    class Song extends Database {

        private $table = 'song';
        public $song_id;
        public $title;
        public $artist_id;
        public $genre;
        public $length;
        
        public function __construct()
        {
            parent::__construct();
        }
        
        public function getPlayLists()
        {
            $sql_query = 'SELECT 
                            s.id AS 
                            song_id,s.title AS 
                            title,a.artist_name AS 
                            artist_name, genre,length
                            FROM '.$this->table.' AS s 
                            LEFT JOIN artist AS a ON 
                            s.song_id = a.artist_id';
            
            $result = $this->query($sql_query);
            return $result;
        }

        public function getSong($id)
        {
            $sql_query = 'SELECT 
                            s.id AS song_id, s.title AS title,
                            a.artist_name AS 
                            artist_name, genre,length
                            FROM '.$this->table.' AS s 
                            LEFT JOIN artist AS a ON 
                                s.song_id = a.artist_id 
                            WHERE 
                                song_id = '.$id.' LIMIT 0,1';
                                
            $result = $this->query($sql_query);
            return $result;
        }

        public function addSong($song_id,$title,$artist_id,$genre,$length)
        {
            $sql_query =  " INSERT INTO song (song_id, title, artist_id, genre, length)
                            VALUES('".$song_id ."','". $title."','". $artist_id ."',
                            '".$genre."','".$length."')";

            $result = $this->query($sql_query);

            if ($result)
            {
                return true;
            }
            else
            {
                printf("Error: Failed to execute query");
                return false;
            }
        }
    }