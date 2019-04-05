<?php
    /* 
        Author:Nelson G Katale
        Raven Music API
        Date:31/3/2019
    */
    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    header('Access-Control-Allow-Methods: POST');
    
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    require_once('../../config.php');
    include(ROOT_PATH. '/models/Song.php');

    $database = new Database();

    $song = new Song();

    //get raw posted data
    $data = json_decode(file_get_contents("php://input"));
    
    // $song->song_id = $data->song_id;
    // $song->title = $data->title;
    // $song->artist_id = $data->artist_id;
    // $song->genre = $data->genre;
    // $song->length = $data->length;
    $song_id = $data->song_id;
    $title = $data->title;
    $artist_id = $data->artist_id;
    $genre = $data->genre;
    $length = $data->length;

    $song_details = array (
        $song_id, $title, $artist_id, $genre,$length
    );

    if ($song->addSong($song_id, $title, $artist_id, $genre,$length))
    {
      echo json_encode(
            array('message' => 'Added new Song ! ')
        );   
    }
    else
    {
       echo json_encode(
            array('message' => 'No Song Added ! ')
        );   
    }
