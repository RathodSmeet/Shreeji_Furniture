<?php
session_start();

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']) !== true) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link href="css/w3.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <style>
        .dashboard-container {
            background: black;
            color: white;
            font-size: 2em;
            padding: 10px;
        }

        .dashboard-menu {
            background: black;
            color: white;
        }

        .dashboard-menu a {
            color: white;
        }
    </style>
</head>

<body>
    <div class="w3-top">
        <div class="dashboard-container">
            Welcome To Shreeji Furniture!

            <span class="navbar-collapse collapse w3-right">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link"
                            href="#"><?php echo "Welcome " . $_SESSION['username'] ?></a>
                    </li>

                </ul>
            </span>
            <div class="dashboard-menu w3-bar w3-white w3-text-red w3-card-2 w3-left-align w3-large">
                <a class="w3-bar-item w3-red w3-button" href="index.php"><i class="fa fa-home"></i>&nbsp;Home</a>
                <div class="w3-dropdown-hover">
                    <button class="w3-button w3-white w3-text-red">Images</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4" style="background-color: black;">
                        <a href="slider.php" class="w3-bar-item w3-button">Slider</a>
                        <a href="categories.php" class="w3-bar-item w3-button" >Categories</a>
                        <a href="aboutus.php" class="w3-bar-item w3-button">About us</a>
                        
                    </div>
                </div>
                <div class="w3-dropdown-hover">
                    <button class="w3-button w3-white w3-text-red">Contact us</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4" style="background-color: black;">
                        <a href="contactus.php" class="w3-bar-item w3-button">Contact Form Data</a>
                        </div>
                </div>
                <div class="w3-dropdown-hover">
                    <button class="w3-button w3-white w3-text-red">Subscribers</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4" style="background-color: black;">
                        <a href="subscribers.php" class="w3-bar-item w3-button">Subscriber List</a>
                       
                    </div>
                </div>
                <a class="w3-bar-item w3-red w3-button  w3-right" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</body>

</html>
