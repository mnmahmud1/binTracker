<?php

    require 'conn.php';

    date_default_timezone_set("Asia/Jakarta");

    // Sign in
    if(isset($_POST['signin'])){
        $username = trim(htmlspecialchars($_POST['username']));
        $password = trim($_POST['password']);
        
        $getUser = mysqli_query($conn, "SELECT username, password FROM users WHERE username = '$username'");

        if(mysqli_num_rows($getUser) == 1){
            $getPass = mysqli_fetch_assoc($getUser);
            if(password_verify($password, $getPass["password"])){
                setcookie("signin", $username, time() + (3600 * 3), "/");
                exit(header("Location: index.php"));
            }
        }

        //! if login is fail give cookie and page detect alert from cookie
        setcookie("sign", "failed", time() + 5, "/");
        header("Location: signin.php");
    }

    // Sign Out
    if(isset($_GET["signout"])){
        setcookie("signin", "", time() , "/");
        
        // unset ALL cookies
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
        
        header("Location: signin.php");
    }

    // Sign Up
    if(isset($_POST["signup"])){
        $name = trim(htmlspecialchars($_POST['name']));
        $bussines = trim(htmlspecialchars($_POST['bussines']));
        $address = trim(htmlspecialchars($_POST['address']));
        $email = trim(htmlspecialchars($_POST['email']));
        $tel = trim(htmlspecialchars($_POST['tel']));
        $username = trim(htmlspecialchars($_POST['username']));
        $password = trim($_POST['password']);
        $created_at = date('Y-m-d H:i:s');
        
        $checkUser = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
        //! check any user use the username
        if(mysqli_num_rows($checkUser) == 0){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($conn, "INSERT INTO users (name, bussines, address, email, tel, username, password, created_at) VALUES('$name', '$bussines', '$address', '$email', '$tel', '$username', '$hash', '$created_at')");
            if(mysqli_affected_rows($conn) > 0){
                setcookie("reg", "success", time() + 5, "/");
                header('Location: signin.php');
            } else {
                //! if sign up is fail to insert to databases
                setcookie("reg", "failed", time() + 5, "/");
                header('Location: signup.php');
            }
        } else {
            //! if sign up is fail give cookie and page detect alert from cookie
            setcookie("reg", "failedUsername", time() + 5, "/");
            header('Location: signup.php');
        }
    }

    // Update Password /User
    if(isset($_POST["updatePass"])){
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];

        $username = $_COOKIE["signin"];
        $checkPass = mysqli_fetch_assoc(mysqli_query($conn, "SELECT password FROM users WHERE username = '$username'"));

        if(password_verify($oldPassword, $checkPass['password'])){
            $hash = password_hash($newPassword, PASSWORD_DEFAULT);
            mysqli_query($conn, "UPDATE users SET password = '$hash' WHERE username = '$username'");

            if(mysqli_affected_rows($conn)){
                //! if update password was successful
                setcookie("updatePass", "success", time() + 5, "/");
                exit(header('Location: profiles.php'));
            } else {
                //! if update password was failed
                setcookie("updatePass", "failed", time() + 5, "/");
                header('Location: profiles.php');
            }
        } else {
            //! if old password not match with input old password
            setcookie("updatePass", "failedNotMatch", time() + 5, "/");
            header('Location: profiles.php');
        }
    }

    if(isset($_POST["sendRequest"])){
        $title = trim(htmlspecialchars($_POST['title']));
        $request = trim(htmlspecialchars($_POST['request']));
        $username = $_COOKIE['signin'];
        $created_at = date('Y-m-d H:i:s');

        //! Check ID User
        $checkID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'"));
        $ID = $checkID['id'];

        mysqli_query($conn, "INSERT INTO requests (title, message, id_user, status, created_at) VALUES ('$title', '$request', $ID, 0, '$created_at')");
        
        if(mysqli_affected_rows($conn)){
            //! if insert was successful
            setcookie("addRequest", "success", time() + 5, "/");
            header('Location: request.php');
        } else {
            //! if insert failed
            setcookie("addRequest", "failed", time() + 5, "/");
            header('Location: request.php');
        }
    }

    if(isset($_POST['pairDevice'])){
        $code = trim(htmlspecialchars($_POST['code']));
        $username = $_COOKIE['signin'];

        //! Check ID User
        $checkID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'"));
        $IDuser = $checkID['id'];

        $checkAvailability = mysqli_query($conn, "SELECT history.id FROM history INNER JOIN devices ON devices.id = history.id_device WHERE devices.code = '$code' AND history.id IN (SELECT MAX(history.id) FROM history GROUP BY history.id_device) AND id_user IS NULL AND status IS NULL AND adopt IS NULL");
        
        if(mysqli_num_rows($checkAvailability) > 0){
            $resultCheckAvailability = mysqli_fetch_assoc($checkAvailability);
            $ID = $resultCheckAvailability['id'];
            mysqli_query($conn, "UPDATE history SET id_user = $IDuser, status = 'TRF', adopt = $IDuser WHERE id = $ID");

            if(mysqli_affected_rows($conn)){
                //! if paired successfull
                setcookie("pairDevice", "success", time() + 5, "/");
                header('Location: devices.php');
            }
        } else {
            //! if check not available / failed
            setcookie("pairDevice", "failed", time() + 5, "/");
            header('Location: devices.php');
        }
    }

    if(isset($_GET['trackingNow'])){
        $lat = $_GET['lat'];
        $long = $_GET['long'];
        
        setcookie("trackLat", $lat, time() + 500, "/");
        setcookie("trackLong", $long, time() + 500, "/");

        header('Location: mapping.php');
    }
    
    if(isset($_GET['deleteCookieLoc'])){
        unset($_COOKIE['trackLat']); 
        setcookie('trackLat', null, -1, '/'); 

        unset($_COOKIE['trackLong']); 
        setcookie('trackLong', null, -1, '/'); 

        header('Location: mapping.php');
    }