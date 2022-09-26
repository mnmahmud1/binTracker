<?php

    require 'conn.php';

    date_default_timezone_set("Asia/Jakarta");

    if(isset($_GET['createHistory'])){
        //! create_history.php?createHistory=1&code=''&volume=''&lat=''&long=''

        $code = $_GET['code'];
        $volume = $_GET['volume'];
        $lat = $_GET['lat'];
        $long = $_GET['long'];
        $created_at = date('Y-m-d H:i:s');

        $callHistory = mysqli_query($conn, "SELECT history.id_device, history.id_user, history.status, history.adopt, devices.id AS ID_Device FROM history INNER JOIN devices ON history.id_device = devices.id WHERE history.id IN (SELECT max(history.id) FROM history GROUP BY history.id_device) AND history.id_device = (SELECT id FROM devices WHERE code = $code)");
        $history = mysqli_fetch_assoc($callHistory);
        
        $callID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM devices WHERE code = $code"));
        
        var_dump(mysqli_num_rows($callHistory));
        
        if(mysqli_num_rows($callHistory) == 0 OR $history['id_user'] == NULL){
            // Row not found / device haven't history
            $idDevice = $callID['id'];
            var_dump('masuk 1'); //Hanya Checking
            var_dump($idDevice); //Hanya Checking

            mysqli_query($conn, "INSERT INTO history (id_device, volume, loc_lat, loc_long, created_at) VALUES ($idDevice, $volume, '$lat', '$long', '$created_at')");
        } elseif (mysqli_num_rows($callHistory) > 0 AND isset($history['id_user'])){
            // Row found / device have adopt other users
            $idDevice = $callID['id'];
            $idUser = $history['id_user'];
            var_dump('masuk 2'); //Hanya Checking
            mysqli_query($conn, "INSERT INTO history (id_device, id_user, volume, loc_lat, loc_long, created_at) VALUES ($idDevice, $idUser, $volume, '$lat', '$long', '$created_at')");
        }
    }


