<?php

    require '../conn.php';

    // Sign in Admin
    if(isset($_POST['signinAdmin'])){
        $username = trim(htmlspecialchars($_POST['username']));
        $password = trim($_POST['password']);
        
        $getUser = mysqli_query($conn, "SELECT username, password FROM admin WHERE username = '$username'");

        if(mysqli_num_rows($getUser) == 1){
            $getPass = mysqli_fetch_assoc($getUser);
            if(password_verify($password, $getPass["password"])){
                setcookie("signinAdmin", $username, time() + (3600 * 3), "/");
                header("Location: index.php");
            }
        } else {
            //! if login is fail give cookie and page detect alert from cookie
            setcookie("signin", "failed", time() + 5, "/");
            header("Location: signin.php");
        }
    }

    // Sign Out Admin
    if(isset($_GET["signout"])){
        setcookie("signinAdmin", "", time() , "/");
        header("Location: signin.php");
    }

    // Update Password /User
    if(isset($_POST["updatePassAdmin"])){
        $oldPassword = $_POST['oldPasswordAdmin'];
        $newPassword = $_POST['newPasswordAdmin'];

        $username = $_COOKIE["signinAdmin"];
        $checkPass = mysqli_fetch_assoc(mysqli_query($conn, "SELECT password FROM admin WHERE username = '$username'"));

        if(password_verify($oldPassword, $checkPass['password'])){
            $hash = password_hash($newPassword, PASSWORD_DEFAULT);
            mysqli_query($conn, "UPDATE admin SET password = '$hash' WHERE username = '$username'");

            if(mysqli_affected_rows($conn)){
                //! if update password was successful
                setcookie("updatePass", "success", time() + 5, "/");
                exit(header('Location: index.php'));
            }
            
            //! if update password was failed
            setcookie("updatePass", "failed", time() + 5, "/");
            header('Location: index.php');
            
        }
        //! if old password not match with input old password
        setcookie("updatePass", "failedNotMatch", time() + 5, "/");
        header('Location: index.php');
    }
    