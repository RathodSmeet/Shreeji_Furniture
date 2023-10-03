<?php

    session_start();
    //check if user already logged in 
    if(isset($_SESSION['username']))
    {
        header("location:index.php");
        exit;
    }
    include 'connect.php';

    $username = $password = "";
    $err = "";

    // if request method is post
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
        {
            $err = "please enter username + passsword";
        }
        else{
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            
        }
    if(empty($err))
    {
        $sql = "SELECT id,username,password FROM admin_register WHERE username = ?";
        $stmt = mysqli_prepare($con,$sql);
        mysqli_stmt_bind_param($stmt,"s",$param_username);
        $param_username = $username;

         //try to execute statement
         if (mysqli_stmt_execute($stmt))
         {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt,$id,$username,$hashed_password);
                if(mysqli_stmt_fetch($stmt))
                {
                    if(password_verify($password,$hashed_password))
                    {
                        //this means the password is correct,Allow user to log in.
                        session_start();
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;
                        
                        //redirect user to welcome page
                        header("location:index.php"); 
                    }
                }
            }
         }

            
    }   
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
	<div class="w3-container" style="padding-top:10%; margin: 0 auto; width: 30%;" id="main">
	<div class="w3-card-4 w3-round-large w3-white">
		<div class="w3-container w3-red w3-center" style="margin:0 auto; border-top-right-radius: 8px; border-top-left-radius: 8px" id="title">
			<h1>Welcome</h1>
		</div>
			<div class="w3-container w3-center" id="sub-header">
				<h2 style="padding-bottom: 2%">Please login to proceed</h2>
			</div>
			<form action="" method="post">
			<div class="w3-container" style="padding: 2%" id="form">
				<div><label class="w3-padding">Username :</label></div>
				<input class="w3-input" id="name" name="username" placeholder="" type="text" style="margin: 0 auto; margin-bottom: 5%; width: 90%" required>

				<div><label class="w3-padding">Password :</label></div>
				<input class="w3-input" id="password" name="password" placeholder="" type="password" style="margin: 0 auto; margin-bottom: 5%; width: 90%" required=>

				<div class="w3-center"><input class="w3-btn w3-round w3-red w3-ripple" name="submit" type="submit" value="Login" style="margin-bottom: 5%"></div>
				
			</div>
			</form>
            <!-- <div class="ml-5 mb-5 w3-red w3-padding">
                <a href="register.php">New Admin? Register here</a>
            </div> -->
	</div>
	</body>
</html>