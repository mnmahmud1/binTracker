<?php

    $conn = mysqli_connect('localhost', 'root', '', 'smartbin_db');

    function convertUsernameToID($username){
        global $conn;
        $return = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'"));
        return $return['id'];
    }