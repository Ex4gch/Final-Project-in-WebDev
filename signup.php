<?php

$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__. "/database.php";

    $sql = "INSERT INTO user (name, email, password) VALUES (?,?,?)";

    $stmt = $mysqli->stmt_init();

    if ( ! $stmt->prepare($sql)){
        die("SQL error: ". $mysqli->error);
    }

    $stmt->bind_param("sss",
                        $_POST["name"],
                        $_POST["email"],
                        $_POST["password"]);

    if ($stmt->execute()){
       
        
    }
    else{
        die($mssqli->error. " " . $mysqli->errno);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(!$success){
        echo '<div class="background" id="content">
        <div class="text">
            <h1>!!  SIGN UP SUCCESSFULL  !!</h1>
            <a href="loginpage.html" class="btn">LOG IN</a>
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

        .background{
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .text{
            width: 50vw;
            height: 20vh;
            text-align: center;
            background-color: green;
            border-radius: 20px;
            padding: 5px;
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
</html>