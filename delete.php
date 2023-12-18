<?php

session_start();

$mysqli = require __DIR__. "/database.php";
$sql = "DELETE FROM `user` WHERE id = {$_SESSION["user_id"]}";
$result = $mysqli->query($sql);

if($result){
    header("location: loginpage.html");
}
else{
    echo "Failed: ". mysqli_error($conn);
}

