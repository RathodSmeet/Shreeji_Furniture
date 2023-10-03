<?php
include 'connect.php';

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Username cannot be blank";
    } else {
        $sql = "SELECT id FROM admin_register WHERE username = ?";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST['username']);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "Something went wrong";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['password'])) < 5) {
        $password_err = "Password must be at least 5 characters long";
    } else {
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if (empty(trim($_POST['confirm_password']))) {
        $confirm_password_err = "Please confirm your password";
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if ($password !== $confirm_password) {
            $confirm_password_err = "Passwords do not match";
        }
    }

    // If no errors, insert into the database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO admin_register (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            if (mysqli_stmt_execute($stmt)) {
                header("Location: login.php");
                exit();
            } else {
                echo "Something went wrong";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome!</title>
    <link href="css/w3.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
</head>
<body class="w3-light-grey">
    <div class="w3-container" style="padding-top:10%; padding-bottom:10%; margin: 0 auto; width: 30%;" id="main">
        <div class="w3-card-4 w3-round-large w3-white">
            <div class="w3-container w3-red w3-center"
                style="margin:0 auto; border-top-right-radius: 8px; border-top-left-radius: 8px" id="title">
                <h1>Welcome</h1>
            </div>
            <div class="w3-container w3-center" id="sub-header">
                <h2 style="padding-bottom: 2%">Please Register to proceed</h2>
            </div>
            <form action="" method="post">
                <div class="w3-container" style="padding: 2%" id="form">
                    <div><label class="w3-padding">Username :</label></div>
                    <input class="w3-input" id="name" name="username" placeholder="" type="text"
                        style="margin: 0 auto; margin-bottom: 5%; width: 90%" required>

                    <div><label class="w3-padding">Password :</label></div>
                    <input class="w3-input" id="password" name="password" placeholder="" type="password"
                        style="margin: 0 auto; margin-bottom: 5%; width: 90%" required>

                    <div><label class="w3-padding">Confirm Password :</label></div>
                    <input class="w3-input" id="confirm_password" name="confirm_password" placeholder=""
                        type="password" style="margin: 0 auto; margin-bottom: 5%; width: 90%" required>

                    <div class="w3-center"><input class="w3-btn w3-round w3-red w3-ripple" name="submit"
                            type="submit" value="Register" style="margin-bottom: 5%"></div>

                </div>
            </form>
        </div>
    </div>
</body>
</html>
