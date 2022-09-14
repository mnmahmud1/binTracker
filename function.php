<?php

    require 'conn.php';

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
        setcookie("signin", "failed", time() + 5, "/");
        header("Location: signin.php");
    }

    // Sign Out
    if(isset($_GET["signout"])){
        setcookie("signin", "", time() , "/");
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
        
        $checkUser = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
        //! check any user use the username
        if(mysqli_num_rows($checkUser) == 0){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($conn, "INSERT INTO users (name, bussines, address, email, tel, username, password) VALUES('$name', '$bussines', '$address', '$email', '$tel', '$username', '$hash')");
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

        //! Check ID User
        $checkID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'"));
        $ID = $checkID['id'];

        mysqli_query($conn, "INSERT INTO requests (title, message, id_user, status) VALUES ('$title', '$request', $ID, 0)");
        
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

