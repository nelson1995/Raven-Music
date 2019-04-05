<?php
    /* 
        Author:Nelson G Katale
        Raven Music API
        Date:31/3/2019
    */
    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once('../../config.php');
    include(ROOT_PATH. '/models/Song.php');

    $database = new Database();

    $song = new Song();
    
    //get id
    $id = isset($_GET['id']) ? $_GET['id'] : die(json_encode(array( 'message' => 'Song not Found !')));
    $result = $song->getSong($id);

    $row = mysqli_fetch_assoc($result);
    extract($row);
    
    $song_item = array(
                'id' => $id,
                'title' => $title,
                'artist_name' => $artist_name,
                'genre' => $genre,
                'length'=> $length
            );

    // turn php array to json and output
    print_r(json_encode($song_item));
    