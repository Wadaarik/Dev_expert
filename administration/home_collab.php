<?php
include 'config.php';
$data_collab = "SELECT * FROM collaborateur;";
$res_collab = mysqli_query($db_connect, $data_collab);
$collab_check = mysqli_num_rows($res_collab);

?>
<!Doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Creation, suppression et modification de Collaborateurs">
    <meta name="keywords" content="">
    <meta name="author" content="John Doe">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <title>Home | Collaborateur</title>
</head>
<body>
<h1>Quelle est votre demande ?</h1>
<hr>
<div class="client">
    <h2>Partie Collaborateurs</h2>
    <button onclick="location.href='new_collab.php'" class="alert-info" style="margin-bottom: 20px">Nouveau Collaborateur</button>
    <button onclick="location.href='modify_collab.php'" class='alert-warning' style="margin: 0 10px">Modifier Collaborateur</button>
    <button onclick="location.href='suppr_collab.php'" class='alert-danger'>Supprimer Collaborateur</button>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Poste</th>
        <th scope="col">Email</th>
        <th scope="col">Département</th>
        <th scope="col">Salaire</th>
        <th scope="col">Mission</th>
    </tr>
    </thead>
    <?php

    if($collab_check > 0){
        while ($row = mysqli_fetch_assoc($res_collab)){
            echo "<tbody>
        <tr>
            <th scope=\"row\">".$row["idCollaborateur"]."</th>
            <td>".$row["Collab_name"]."</td>
            <td>".$row["Poste"]."</td>
            <td>".$row["Collab_email"]."</td>
            <td>".$row["Collab_type"]."</td>
            <td>".$row["Salaire"]."</td>
            <td>".$row["Missions"]."</td>
        </tr>
        </tbody>
";
        }
    }
    ?>
</table>

</body>
</html>
