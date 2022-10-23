<?php

    $conn = mysqli_connect('localhost', 'mnmahmu1_admin', 'haganosaga12', 'mnmahmu1_smartbin_db');

    function convertUsernameToID($username){
        global $conn;
        $return = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'"));
        return $return['id'];
    }