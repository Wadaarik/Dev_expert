<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Creation, suppression et modification de clients">
    <meta name="keywords" content="">
    <meta name="author" content="John Doe">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="./src/home.css">
</head>
<style>
    body{
        margin: 0;
        padding: 0;
        background: #0b0b0b;
        overflow: hidden;
    }
    .container{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
    }
    li{
        display: inline-block;
    }
    li a{
        text-decoration: none;
        display: inline-block;
        color: #fff;
        font-family: "Helvetica-Normal";
        font-weight: lighter;
        font-size: 28px;
        padding: 0 20px;
    }
    .cool-link::after{
        content: '';
        display: block;
        width: 0;
        height: 2px;
        background: #fff;
        transition: width .3s;
    }
    .cool-link:hover::after{
        width: 100%;
        transition: width .3s;
    }

</style>
<body>
<div class="container">
    <li><a href="./administration/home_client.php" class="cool-link">Clients</a></li>
    <li><a href="./administration/home_collab.php" class="cool-link">Collaborateurs</a></li>
    <li><a href="./administration/home_missions.php" class="cool-link">Missions</a></li>
</div>
</body>
</html>

