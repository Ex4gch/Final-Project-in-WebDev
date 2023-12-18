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
    <link rel="stylesheet" href="homec.css">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>     
    <script src="script.js"></script>
    <title>Home</title>
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
                </nav>
            </div>
        </header>
        <div class="content1">
            <div class="color"></div>
            <div class="background bg1">

            </div>
            <div class="background bg2">
                
            </div>
        </div>
        <div class="content2 reveal">
            <div class="text text1">
                <h1>Cats bring joy and health benefits,</h1><p></p>Reducing stress through affectionate interactions and purring. Scientifically linked to lower blood pressure and improved mood, their presence fosters a calming atmosphere. Caring for a cat establishes routine and responsibility, while their non-judgmental companionship provides comfort, making them valuable contributors to human well-being.</p>
            </div>
        </div>
        <div class="content3 reveal">
            <div class="color"></div>
            <div class="random-cat" id="catcon">
                <button class="cat-btn" onclick="getCats()">GET CATS</button>
            </div>
        </div>
        <div class="content4 reveal">
            <div class="review-header">
                <h1>TESTIMONIALS</h1>
            </div>
            <div class="reviews">
                <div class="review-card">
                    <span><i class="ri-double-quotes-l"></i></span>
                    <p>
                    “My job is demanding, and stress used to consume me. But ever since adopting Mochi, my adorable tabby, things have changed. His playful antics and soothing presence are my daily stress-busters. Coming home to him is the best part of my day!”
                    </p>
                    <hr>
                    <img src="https://scontent.fmnl4-3.fna.fbcdn.net/v/t1.15752-9/387419562_3589736024580976_6440169860901102871_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFrsKmny5RLzfUKKR3-HnmLzItyXEcGMtfMi3JcRwYy139FRFVHrPKJn8TYM9g_pQEqQWiUkp_9pTg_FwNoVODE&_nc_ohc=G7kW-w13czcAX_8BBA_&_nc_ht=scontent.fmnl4-3.fna&oh=03_AdRTYosMfxJooezYym6eCJ_kPgmMio--5ZWtxQNcyhZhZA&oe=65A79897" alt="">
                    <p class="name">Jeff</p>
                </div>
                <div class="review-card">
                    <span><i class="ri-double-quotes-l"></i></span>
                    <p>
                    “Owning a cat isn't just having a pet; it's gaining a lifelong friend. My cat, Luna, has been with me through thick and thin. Her gentle nature and constant companionship make every day brighter. I can't imagine my life without her by my side.”
                    </p>
                    <hr>
                    <img src="https://scontent.fmnl4-3.fna.fbcdn.net/v/t1.15752-9/395527258_1666801400509321_4043098414232205361_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeE0L8tZPipXPM2vjAJWd6ybBv4Xjm270n8G_heObbvSf3dOU4Hpjdf8KDdr4dsPfGC0jpR9c1bfALbleLBin0gf&_nc_ohc=0wO0E7WFqHYAX9VgECV&_nc_ht=scontent.fmnl4-3.fna&oh=03_AdTzA5phg8iG2-c_L1GYydjhARQhXeM6fwLIxH6BylQ0vw&oe=65A7A9AF" alt="">
                    <p class="name">Oyao</p>
                </div>
                <div class="review-card">
                    <span><i class="ri-double-quotes-l"></i></span>
                    <p>
                    “Cats are more than pets; they're intuitive companions. When I went through a tough breakup, my cat, Shadow, seemed to sense my sadness. He stayed by my side, offering comfort and purring softly. His presence was a silent but powerful source of healing.”
                    </p>
                    <hr>
                    <img src="https://scontent.fmnl4-5.fna.fbcdn.net/v/t1.15752-9/381913976_3675735746085955_4459200561580486554_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeEILXWhw6WuRVPoXwvZby-6DmFZQV-FjZsOYVlBX4WNmzIV6Iv3Iwr4Uh0ZEmM3JVC_p08K7xM4vzk93ARKXvFX&_nc_ohc=41aZ3nIos0UAX_TXOH9&_nc_ht=scontent.fmnl4-5.fna&oh=03_AdSWH7cz65mbtN-8Zrtl08iYOE4DI_PpgBzBmz3Q0ipl7w&oe=65A7988D" alt="">
                    <p class="name">IBALE</p>
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
        function hide(){
            document.getElementById("hide").style.display = "none";
            document.getElementById("main").style.display = "block";
        }

        function getCats(){
            fetch("https://api.thecatapi.com/v1/images/search")
                .then((data)=> {
                    return data.json();
                }).then((objectData)=>{
                    let tableData = "";
                    objectData.map((values)=>{
                        tableData = 
                        `
                        <div class="cat-image">
                            <img class="image" src="${values.url}"/>
                        </div><button class="cat-btn" onclick="getCats()">GET CATS</button>`
                    });
                    document.getElementById("catcon").
                    innerHTML = tableData;
                });
            }
    </script>
</html>