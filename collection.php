<?php

session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__. "/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
    
    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="collection.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <script src="collection.js"></script>
    <title>Cats</title>
</head>
<body onload="setTimeout('hide()', 2000)">
    <div class="preload" id="hide">
        <img src="https://cdn.dribbble.com/users/2882885/screenshots/7861928/media/a4c4da396c3da907e7ed9dd0b55e5031.gif" alt="" class="catgif">
    </div>
    <div class="main" id="main">
    <header class="header">
        <div class="head">
        <a href="http://127.0.0.1/finals/home2.php" class="logo">Cats And What It Brings To Us</a>
            
            <nav class="nav">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="http://127.0.0.1/finals/aboutme2.php" class="nav-link one">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://127.0.0.1/finals/collection.php" class="nav-link two">Cats</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://127.0.0.1/finals/myprofile.php" class="nav-link four"><?= htmlspecialchars($user["name"])?></a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="btn">LOGOUT</a>
                    </ul>
                </ul>
            </nav>
        </div>
    </header>   
    <div class="background">
        <div class="container" id="cont">
            
        </div>
        <a href="https://cats.com/" class="links">Want to know more about cats? Click here</a>
    </div>
</body>
    <style>
    body{
        padding: 0;
        margin: 0;
        width: 100vw;
        height: 100vh;    
    }

    #main{
        display: none;
    }

    .preload{
        height: 100%;
        width: 100%;
        background-color: black;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #282828;
    }

    .catgif{
        width: 20%;
    }
    </style>
    <script>
         function hide(){
            document.getElementById("hide").style.display = "none";
            document.getElementById("main").style.display = "block";
        }
    </script>
</html>