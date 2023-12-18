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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <script src="script.js"></script>
    <link rel="stylesheet" href="aboutme.css">
    <title>About Me</title>
</head>
<body>
    <header>
        <nav> 
            <a href="http://localhost/finals/home.php" class="aimage"><img src="/img/image-removebg-preview.png" alt="" class="a-image"></a> 
            <ul>
                <li><a href="http://localhost/finals/home.php">Home</a></li>
                <li><a href="http://localhost/finals/aboutme.php">About Me</a></li>
                <li><a href="http://localhost/finals/collection.php">Cats</a></li>
            </ul>
        </nav>
        <div class="buttons">
            <a href="http://localhost/finals/myprofile.php" ><?= htmlspecialchars($user["name"])?><p style="opacity: 0;">a</p></a>
            <button><a href="logout.php">Logout</a></button>
       </div>
    </header>    
    <div class="background">
        <div class="aboutme-container">
            <div class="aboutme-photo left">
                <img src="/img/Joo2.png" alt="">
            </div>
            <div class="aboutme-text right">
                <h1>About Me</h1>
                <p>I'm John Rey Donal, I am currently studying at University Of Cebu taking the course of Information Technology. I'am a cat enthusiast as you clearly see the theme of this wesite.</p><br>
                <p>Moto in life: <span class="moto">"Undang na samtang sayu pa."</span></p>
            </div>
        </div>
    </div>
    
</body>
</html>