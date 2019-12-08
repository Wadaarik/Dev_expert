<?php
include 'config.php';

if(isset($_POST['modify_client']))
{
    $idClient = mysqli_real_escape_string($db_connect, $_POST['idClient']);
    $client_name = mysqli_real_escape_string($db_connect, $_POST['name_create']);
    $surname = mysqli_real_escape_string($db_connect, $_POST['surname_create']);
    $phone = mysqli_real_escape_string($db_connect, $_POST['phone']);
    $address = mysqli_real_escape_string($db_connect, $_POST['address']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $societe = mysqli_real_escape_string($db_connect, $_POST['societe']);


    if (count($errors) == 0) {
        $db_update = "UPDATE client SET Client_name='$client_name', Surname='$surname', Phone='$phone', Adress='$address', Email='$email', Societe='$societe' WHERE idClient='$idClient'";
    }
    if($db_connect->query($db_update)===TRUE){
        header('location: home_client.php');
        echo '<div class="jumbotron alert-succeed">Modification accepté</div>';
    }else{
        echo '<div class="jumbotron alert-danger">Modification refusé</div>';
    }

}

?>
<!Doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Modification de Clients">
    <meta name="keywords" content="">
    <meta name="author" content="John Doe">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <title>Modier le client</title>
</head>
<body>
<form class="col-5" method="post" action="modify_client.php" style="margin-bottom: 20px;">
    <a href="javascript:history.go(-1)">BACK</a>
    <h3>ID du client</h3>
    <div class="form-group">
        <label for="idClient">ID Client</label>
        <input type="number" class="form-control" id="idClient" aria-describedby="idClient" name="idClient" placeholder="Aa" required>
    </div>
    <h3>Informations à renseigner</h3>
    <div class="form-group">
        <label for="name_create">Nom</label>
        <input type="text" class="form-control" id="name_create" aria-describedby="name_modify" name="name_create" placeholder="Aa" required>
    </div>
    <div class="form-group">
        <label for="surname_create">Prénom</label>
        <input type="text" class="form-control" id="surname_create" name="surname_create" placeholder="Aa" required>
    </div>
    <div class="form-group">
        <label for="phone">Téléphone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="0605040603" required>
    </div>
    <div class="form-group">
        <label for="address">Addresse</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="johndoe@email.com" required>
    </div>
    <div class="form-group">
        <label for="societe">Société</label>
        <input type="text" class="form-control" id="societe" aria-describedby="societe" name="societe" placeholder="Aa" required>
    </div>
    <button type="submit" class="btn btn-warning" name="modify_client">Modifier le client</button>
</form>
</body>
</html>
