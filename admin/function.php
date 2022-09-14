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
            } else {
                //! if update password was failed
                setcookie("updatePass", "failed", time() + 5, "/");
                header('Location: index.php');
            }
        } else {
            //! if old password not match with input old password
            setcookie("updatePass", "failedNotMatch", time() + 5, "/");
            header('Location: index.php');
        }
    }
    

    // Add New Agency from Admin
    if(isset($_POST["regAgency"])){
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
                header('Location: agency.php');
            } else {
                //! if sign up is fail to insert to databases
                setcookie("reg", "failed", time() + 5, "/");
                header('Location: agency.php');
            }
        } else {   
            //! if sign up is fail give cookie and page detect alert from cookie
            setcookie("reg", "failedUsername", time() + 5, "/");
            header('Location: agency.php');
        }
    }

    // Delete Agency From Admin Server
    if(isset($_POST['deleteAgency'])){
        $id = trim(htmlspecialchars($_POST['id']));

        mysqli_query($conn, "DELETE FROM users WHERE id = $id");
        if(mysqli_affected_rows($conn) > 0){
            setcookie("del", "success", time() + 5, "/");
            header('Location: agency.php');
        } else {
            //! if delete agency is failed
            setcookie("del", "failed", time() + 5, "/");
            header('Location: agency.php');
        }
    }

    if(isset($_POST['updateProfileAgency'])){
        $name = trim(htmlspecialchars($_POST['name']));
        $address = trim(htmlspecialchars($_POST['address']));
        $bussines = trim(htmlspecialchars($_POST['bussines']));
        $email = trim(htmlspecialchars($_POST['email']));
        $tel = trim(htmlspecialchars($_POST['tel']));

        $ID = $_COOKIE['user'];

        mysqli_query($conn, "UPDATE users SET name = '$name', address = '$address', bussines = '$bussines', email = '$email', tel = '$tel' WHERE id = $ID");
        if(mysqli_affected_rows($conn) > 0){
            setcookie("updateProfil", "success", time() + 5, "/");
            header('Location: details-agency.php');
        } else {
            //! if delete agency is failed
            setcookie("updateProfil", "failed", time() + 5, "/");
            header('Location: details-agency.php');
        }
    }

    if(isset($_POST['updateUsernameAgency'])){
        $username = trim(htmlspecialchars($_POST['username']));

        $ID = $_COOKIE['user'];

        mysqli_query($conn, "UPDATE users SET username = '$username' WHERE id = $ID");
        if(mysqli_affected_rows($conn) > 0){
            setcookie("updateProfil", "success", time() + 5, "/");
            header('Location: details-agency.php');
        } else {
            //! if delete agency is failed
            setcookie("updateProfil", "failed", time() + 5, "/");
            header('Location: details-agency.php');
        }
    }

    // Update Password /User
    if(isset($_POST["updatePassAgency"])){
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];

        $ID = $_COOKIE["user"];
        $checkPass = mysqli_fetch_assoc(mysqli_query($conn, "SELECT password FROM users WHERE id = $ID"));

        if(password_verify($oldPassword, $checkPass['password'])){
            $hash = password_hash($newPassword, PASSWORD_DEFAULT);
            mysqli_query($conn, "UPDATE users SET password = '$hash' WHERE id = '$ID'");

            if(mysqli_affected_rows($conn)){
                //! if update password was successful
                setcookie("updatePass", "success", time() + 5, "/");
                header('Location: details-agency.php');
            } else {
                //! if update password was failed
                setcookie("updatePass", "failed", time() + 5, "/");
                header('Location: details-agency.php');
            }
        } else {
            //! if old password not match with input old password
            setcookie("updatePass", "failedNotMatch", time() + 5, "/");
            header('Location: details-agency.php');
        }
    }


    // Change Status Requests
    if(isset($_GET["updateStatusRequest"])){
        $id = $_GET['id'];
        
        mysqli_query($conn, "UPDATE requests SET status = 1 WHERE id_user = $id");
        if(mysqli_affected_rows($conn)){
            header('Location: details-agency.php');
        }
    }
