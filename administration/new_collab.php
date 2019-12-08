<?php
include 'config.php';

if (isset($_POST['submit_collab'])){
    $collab_name = mysqli_real_escape_string($db_connect, $_POST['collab_name']);
    $poste = mysqli_real_escape_string($db_connect, $_POST['poste']);
    $collab_email = mysqli_real_escape_string($db_connect, $_POST['collab_email']);
    $collab_type = mysqli_real_escape_string($db_connect, $_POST['collab_type']);
    $salaire = mysqli_real_escape_string($db_connect, $_POST['salaire']);
    $missions = mysqli_real_escape_string($db_connect, $_POST['missions']);


    $collab_check_query = "SELECT * FROM collaborateur WHERE Collab_email='$collab_email' LIMIT 1";
    $result = mysqli_query($db_connect, $collab_check_query);
    $collabt_verif = mysqli_fetch_assoc($result);

    if ($collabt_verif) {
        if ($collabt_verif['collab_email'] === $collab_email) {
            array_push($errors, "L'email existe déja");
        }
    }

    if (count($errors) == 0) {
        $sql_collab = "INSERT INTO collaborateur (Collab_name, Poste, Collab_email, Collab_type, Salaire, Missions) 
  			  VALUES('$collab_name', '$poste', '$collab_email','$collab_type', '$salaire', '$missions')";
        mysqli_query($db_connect, $sql_collab);
        header('location: home_collab.php');
    }else{
        header('location: /');
        echo "Collaborateur non créé";
    }
}


?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Creation de clients">
    <meta name="keywords" content="">
    <meta name="author" content="John Doe">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <title>Client</title>
</head>
<body>

<form class="col-5" method="post" action="new_collab.php" style="margin-bottom: 20px;">
    <a href="javascript:history.go(-1)">BACK</a>
    <div class="form-group">
        <label for="collab_name">Nom Complet</label>
        <input type="text" class="form-control" id="collab_name" aria-describedby="collab_name" name="collab_name" placeholder="Aa" required>
    </div>
    <div class="form-group">
        <label for="poste">Poste</label>
        <input type="text" class="form-control" id="poste" name="poste" placeholder="Aa" required>
    </div>
    <div class="form-group">
        <label for="collab_email">Email</label>
        <input type="email" class="form-control" id="collab_email" name="collab_email" placeholder="johndoe@email.com" required>
    </div>
    <div class="form-group">
        <label for="collab_type">Type de Collaborateur</label>
        <select  multiple class="form-control" id="collab_type" name="collab_type" required>
            <optgroup label="Département techniques">
                <option value="Système d’information">Système d’information</option>
                <option value="Système d’information">Web</option>
                <option value="Système d’information">Réalité virtuelle</option>
                <option value="Système d’information">Informatique embarquée</option>
                <option value="Système d’information">Réseau et sécurité</option>
            </optgroup>
            <optgroup label="Personnel administratif">
                <option value="Commerciaux">Commerciaux</option>
                <option value="Commerciaux">Secrétaires</option>
                <option value="Commerciaux">Comptables</option>
            </optgroup>
            <optgroup label="Experts techniques">
                <option value="Expert Interne">Internes</option>
                <option value="Expert Externe">Externes</option>
            </optgroup>
        </select>
    </div>
    <div class="form-group">
        <label for="salaire">Salaire</label>
        <input type="text" class="form-control" id="salaire" name="salaire" placeholder="Aa" required>
    </div>
    <div class="form-group">
        <label for="missions">Mission</label>
        <input type="text" class="form-control" id="missions" aria-describedby="missions" name="missions" placeholder="Aa" required>
    </div>
    <button type="submit" class="btn btn-success" name="submit_collab">Créer le collaborateur</button>
</form>
</body>
</html>
