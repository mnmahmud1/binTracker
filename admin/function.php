<?php

    require '../conn.php';

    date_default_timezone_set("Asia/Jakarta");
    $created_at = date('Y-m-d H:i:s');

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
            mysqli_query($conn, "INSERT INTO users (name, bussines, address, email, tel, username, password, created_at) VALUES('$name', '$bussines', '$address', '$email', '$tel', '$username', '$hash', '$created_at')");
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


    // Change Status Requests (details agency)
    if(isset($_GET["updateStatusRequest"])){
        $id = $_GET['id'];
        
        mysqli_query($conn, "UPDATE requests SET status = 1 WHERE id = $id");
        if(mysqli_affected_rows($conn)){
            header('Location: details-agency.php');
        }
    }

    // Change Status Requests (requests)
    if(isset($_GET["updateStatusRequestAdmin"])){
        $id = $_GET['id'];
        
        mysqli_query($conn, "UPDATE requests SET status = 1 WHERE id = $id");
        if(mysqli_affected_rows($conn)){
            header('Location: requests.php');
        }
    }

    // Connect Devices /Admin
    if(isset($_POST['connectDevice'])){
        $code = trim(htmlspecialchars($_POST['code']));
        $description = trim(htmlspecialchars($_POST['description']));

        $checkCode = mysqli_query($conn, "SELECT id FROM devices WHERE code = '$code'");

        if(mysqli_num_rows($checkCode) == 0){
            mysqli_query($conn, "INSERT INTO devices (code, description, created_at) VALUES ('$code', '$description', '$created_at')");
    
            if(mysqli_affected_rows($conn)){
                //! if insert device was successfull
                setcookie("connectDevice", "success", time() + 5, "/");
                header('Location: devices-production.php');
            } else {
                //! if insert device was failed
                setcookie("connectDevice", "failed", time() + 5, "/");
                header('Location: devices-production.php');
            }
        } else {
            //! if insert device was successfull
            setcookie("connectDevice", "failedCode", time() + 5, "/");
            header('Location: devices-production.php');
        }
    }


    // Transfer Device device-production
    if(isset($_POST['transferDevice'])){
        $endAgency = trim(htmlspecialchars($_POST['endAgency']));
        
        $deviceID = $_COOKIE['deviceID'];
        $agencyStart = $_COOKIE['agencyIDStart'];


        $update = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_device, volume, loc_lat, loc_long FROM history WHERE id_device=$deviceID AND id_user = $agencyStart ORDER BY id DESC LIMIT 1"));
        // mysqli_query($conn, "INSERT INTO history (id_device, volume, loc_lat, loc_long) SELECT id_device, volume, loc_lat, loc_long FROM history WHERE id_device=$deviceID AND id_user = $agencyStart ORDER BY id DESC LIMIT 1");
        $id_device = $update['id_device'];
        $volume = $update['volume'];
        $loc_lat = $update['loc_lat'];
        $loc_long = $update['loc_long'];
        mysqli_query($conn, "INSERT INTO history (id_device, id_user, status, volume, loc_lat, loc_long, created_at) VALUES ($id_device, $endAgency, 'TRF', $volume, '$loc_lat', '$loc_long', '$created_at')");

        if(mysqli_affected_rows($conn)){
            //! if transfer device was successfull
            setcookie("transferDevice", "success", time() + 5, "/");
            header('Location: devices-production.php');
        } else {
            //! if transfer device was failed
            setcookie("transferDevice", "failed", time() + 5, "/");
            header('Location: devices-production.php');
        }
    }

    // Disconnect devices with success connect
    if(isset($_GET['disconnectDevice'])){
        $id = $_GET['id'];
        
        mysqli_query($conn, "DELETE devices, history FROM devices INNER JOIN history ON devices.id = history.id_device WHERE devices.id = $id");
        
        if(mysqli_affected_rows($conn)){
            //! if disconnect device was successfull
            setcookie("disconnectDevice", "success", time() + 5, "/");
            header('Location: devices-production.php');
        } else {
            //! if disconnect device was failed
            setcookie("disconnectDevice", "failed", time() + 5, "/");
            header('Location: devices-production.php');
        }
    }

    // Delete devices with failed connect
    if(isset($_GET['deleteDevice'])){
        $id = $_GET['id'];
        
        mysqli_query($conn, "DELETE FROM devices WHERE id = $id");
        
        if(mysqli_affected_rows($conn)){
            //! if delete device was successfull
            setcookie("deleteDevice", "success", time() + 5, "/");
            header('Location: devices-production.php');
        } else {
            //! if delete device was failed
            setcookie("deleteDevice", "failed", time() + 5, "/");
            header('Location: devices-production.php');
        }
    }
