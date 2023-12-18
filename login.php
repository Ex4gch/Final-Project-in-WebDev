<?php
$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__. "/database.php";

    $sql = sprintf("SELECT * FROM user
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);
    session_start();

    $user = $result->fetch_assoc();
    
    if ($user) {
       if ( $_POST["password"] == $user["password"]){

        session_start();
       

        $_SESSION["user_id"] = $user["id"];
        header("location: home2.php");
        
       } 
    }

    $success = false;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="setTimeout('hide()', 1500)">
    <div class="preload" id="hide">
        <img src="https://cdn.dribbble.com/users/2882885/screenshots/7861928/media/a4c4da396c3da907e7ed9dd0b55e5031.gif" alt="" class="catgif">
    </div>
    <?php if(!$success){
        echo '<div class="background" id="content">
        <div class="text">
            <h1>!!  INVALID LOGIN  !!</h1>
            <a href="loginpage.html" class="btn">TRY AGAIN</a>
        </div>
    </div>';
    } 
    ?>
    
    
</body>
    <style>
        body{
            padding: 0;
            margin: 0;
            width: 100vw;
            height: 100vh;    
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

        .background{
            height: 100vh;
            width: 100vw;
            display: none;
            justify-content: center;
            align-items: center;
        }

        .text{
            width: 30vw;
            height: 20vh;
            text-align: center;
            background-color: red;
            border-radius: 20px;
        }

        .btn{
            width: 50px;
            height: 20px;
            border-radius: 10px;
            background-color: white;
            padding: 5px 20px;
            text-decoration: none;
            color: black;
        }
    </style>
    <script>
        function hide(){
            document.getElementById("hide").style.display = "none";
            document.getElementById("content").style.display = "flex";
        }
    </script>
</html> 