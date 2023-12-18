<?php

session_start();
$mysqli = require __DIR__. "/database.php";
$sqls = "SELECT * from user";
$results = $mysqli->query($sqls);

    if (isset($_SESSION["user_id"])) {
        $mysqli = require __DIR__. "/database.php";

        $sql = "SELECT * FROM user
                WHERE id = {$_SESSION["user_id"]}";
        
        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();
    }

$mysqli = require __DIR__. "/database.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $sql = "UPDATE `user` SET `name`='$name',`email`='$email',`password`='$password' WHERE id={$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    if($result){
        header("location: /finals/myprofile.php");
    }
    else{
        echo "Failed: ". mysqli_error($conn);
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="myprofile.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
</head>
<body onload="setTimeout('hide()', 3000)">
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
        <div class="prompt" id="pro">
            <form action="/finals/delete.php" method="POST">
                <h1>SURE NAKA SA IMNG DESISYON??</h1>
                <div class="btns2"><button class="btn2">CONFIRM</button><div class="btn2" id="btn4" onclick="godecline()">CANCEL</div></div>
            </form>
        </div>

        <div id="ucontainer">
                        <h1>USERS</h1>
                        <table>
                            <tr>
                                <th>USER ID</th>
                                <th>USERNAME</th>
                                <th>EMAIL</th>
                            </tr>
                            <tr>
                                <?php
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                ?>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['email']?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                        </table>
                        <button class="btn" id="btnback" onclick="hideUsers()">BACK</button>
                    </div>
        <div class="profile-container" id="up">
           
            <div class="upper">
                <div class="image">
                    <img class="icat" src="https://i.pinimg.com/564x/b9/68/3d/b9683d3fe3f25bca278364f64f215c2a.jpg" alt="">
                </div>
                <div class="account-info">
                    <form class="form1" id="form1" method="post">
                        <input type="hidden" value="<?php echo $id; ?>">
                            <div class="text text1">
                                <table>
                                <tr>
                                    <td>
                                        <label for="">Username: </label>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($user["name"])?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="">Email:</label>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($user["email"])?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="">Password:</label>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($user["password"])?>
                                    </td>
                                </tr>
                                </table>
                            </div>
                            <div class="btns"><div class="btn2" id="btn" onclick="goEdit()">EDIT</div><div class="btn2" id="btn3" onclick="godelete()">DELETE ACCOUNT</div></div>
                    </form>
                    <form class="form2" id="form2" action="" method="post">
                        <input type="hidden" value="<?php echo $id; ?>">                  
                            <div class="text tex2">
                                <table>
                                <tr>
                                    <td>
                                        <label for="">Username:</label>
                                    </td>
                                    <td>
                                        <input type="text"  id="name" name="name" autocomplete="off" value="<?= htmlspecialchars($user["name"])?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="">Email:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="email" id="email" autocomplete="off" value="<?= htmlspecialchars($user["email"])?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="">Password:</label>
                                    </td>
                                    <td>
                                        <input type="password" name="password" id="password2" autocomplete="off" value="<?= htmlspecialchars($user["password"])?>" required>
                                    </td>
                                </tr>
                                </table>
                            </div>
                            <div class="btns2"><button class="btn2" >CONFIRM</button><div class="btn2" id="btn" onclick="cancel()">CANCEL</div></div>
                    </form>
                </div>  
                </div>          
            <div class="lower">
                    <button id="btn5" onclick="wow()">SHOW USERS</button>
            </div>
        </div>
    </div>
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
        function wow(){
            document.getElementById("up").style.display = "none";
            document.getElementById("ucontainer").style.display = "flex";
        }

        function hideUsers(){
            document.getElementById("up").style.display = "block";
            document.getElementById("ucontainer").style.display = "none";
        }
        
        function hide(){
            document.getElementById("hide").style.display = "none";
            document.getElementById("main").style.display = "block";
        }
    </script>
</html>