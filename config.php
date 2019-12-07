<?php
$db_connect = mysqli_connect('localhost', 'root', '', 'dev_expert');
if (!$db_connect){
    die('Connexion impossible : ' . mysqli_error());
}else{
    echo '<div class="connexion"><img src="src/network.png" style="width: 20px; margin-right: 10px;" alt="connexion" title="connected">Connecté au service</div>';
}

$errors = array();
?>
<html>
<head>
    <link rel="stylesheet" href="src/home.css">
</head>
</html>
