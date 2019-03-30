<?php
    /* 
        Author:Nelson G Katale
        Date:31/3/2019
    */
    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once('../../config.php');
    include(ROOT_PATH. '/models/Song.php');

    $database = new Database();

    $song = new Song();

    $result = $song->getPlayList();

    // get number of songs
    $num = mysqli_num_rows($result);

    if( $num > 0) 
    {   
        // $songs_arr = array();
        $songs_arr['data'] = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            extract($row);
            $song_item = array(
                'song_id' => $song_id,
                'title' => $title,
                'artist_name' => $artist_name,
                'genre' => $genre,
                'length'=> $length
            );
            array_push($songs_arr['data'], $song_item);
        }
        // turn php array to json and output
        echo json_encode($songs_arr);
    }
    else
    {
        echo json_encode(
            array('message' => 'No songs found ! ')
        );   
    }