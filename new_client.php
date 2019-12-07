<?php
include 'config.php';

if (isset($_POST['submit_client'])){
    $client_name = mysqli_real_escape_string($db_connect, $_POST['name_create']);
    $surname = mysqli_real_escape_string($db_connect, $_POST['surname_create']);
    $phone = mysqli_real_escape_string($db_connect, $_POST['phone']);
    $address = mysqli_real_escape_string($db_connect, $_POST['address']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $societe = mysqli_real_escape_string($db_connect, $_POST['societe']);

    if(strlen($phone) < 10){
        array_push($errors, "Veuillez entrer un numéro valide (minimum 10 numéros)");
    }elseif (strlen($phone) >10 ){
        array_push($errors, "Veuillez entrer un numéro valide (maximum 10 numéros)");
    }

    $user_check_query = "SELECT * FROM client WHERE Email='$email' LIMIT 1";
    $result = mysqli_query($db_connect, $user_check_query);
    $client_verif = mysqli_fetch_assoc($result);

    if ($client_verif) {
        if ($client_verif['email'] === $email) {
            array_push($errors, "L'email existe déja");
        }
    }

    if (count($errors) == 0) {
        $sql_client = "INSERT INTO client (Client_name, Surname, Phone, Adress, Email, Societe) 
  			  VALUES('$client_name', '$surname', '$phone','$address', '$email', '$societe')";
        mysqli_query($db_connect, $sql_client);
        header('location: home_client.php');
    }else{
        header('location: /');
        echo "Client non créé";
    }
}


?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Creation, suppression et modification de clients">
    <meta name="keywords" content="">
    <meta name="author" content="John Doe">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <title>Client</title>
</head>
<body>

    <form class="col-5" method="post" action="new_client.php" style="margin-bottom: 20px;">
        <a href="javascript:history.go(-1)">BACK</a>
        <div class="form-group">
            <label for="name_create">Nom</label>
            <input type="text" class="form-control" id="name_create" aria-describedby="name_create" name="name_create" placeholder="Aa">
        </div>
        <div class="form-group">
            <label for="surname_create">Prénom</label>
            <input type="text" class="form-control" id="surname_create" name="surname_create" placeholder="Aa">
        </div>
        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="0605040603">
        </div>
        <div class="form-group">
            <label for="address">Addresse</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="johndoe@email.com">
        </div>
        <div class="form-group">
            <label for="societe">Société</label>
            <input type="text" class="form-control" id="societe" aria-describedby="societe" name="societe" placeholder="Aa">
        </div>
        <button type="submit" class="btn btn-success" name="submit_client">Créer le client</button>
    </form>
</body>
</html>
