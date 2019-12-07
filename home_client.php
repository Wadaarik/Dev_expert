<?php
include 'config.php';
$data_client = "SELECT * FROM client;";
$res_client = mysqli_query($db_connect, $data_client);
$res_check = mysqli_num_rows($res_client);

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Homepage">
    <meta name="keywords" content="">
    <meta name="author" content="John Doe">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
<h1>Quelle est votre demande ?</h1>
<hr>
<div class="client">
    <h2>Partie Client</h2>
    <button onclick="location.href='new_client.php'" class="alert-info" style="margin-bottom: 20px">Nouveau client</button>
    <button onclick="location.href='modify_client.php'" class='alert-warning' style="margin: 0 10px">Modifier client</button>
    <button onclick="location.href='suppr_client.php'" class='alert-danger'>supprimer client</button>
</div>

<?php

if($res_check > 0){
    while ($row = mysqli_fetch_assoc($res_client)){
        echo "<table class=\"table\">
    <thead>
    <tr>
        <th scope=\"col\">#</th>
        <th scope=\"col\">Nom</th>
        <th scope=\"col\">Prénom</th>
        <th scope=\"col\">Téléphone</th>
        <th scope=\"col\">Adresse</th>
        <th scope=\"col\">Email</th>
        <th scope=\"col\">Société</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope=\"row\">".$row["idClient"]."</th>
        <td>".$row["Client_name"]."</td>
        <td>".$row["Surname"]."</td>
        <td>".$row["Phone"]."</td>
        <td>".$row["Adress"]."</td>
        <td>".$row["Email"]."</td>
        <td>".$row["Societe"]."</td>
    </tr>
    </tbody>
</table>";

    }
}

?>

</body>
</html>
