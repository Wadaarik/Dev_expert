<?php
include 'config.php';

if(isset($_POST['modify_collab']))
{
    $idCollaborateur = mysqli_real_escape_string($db_connect, $_POST['idCollaborateur']);
    $collab_name = mysqli_real_escape_string($db_connect, $_POST['collab_name']);
    $poste = mysqli_real_escape_string($db_connect, $_POST['poste']);
    $collab_email = mysqli_real_escape_string($db_connect, $_POST['collab_email']);
    $collab_type = mysqli_real_escape_string($db_connect, $_POST['collab_type']);
    $salaire = mysqli_real_escape_string($db_connect, $_POST['salaire']);
    $missions = mysqli_real_escape_string($db_connect, $_POST['missions']);


    if (count($errors) == 0) {
        $db_update = "UPDATE collaborateur SET Collab_name='$collab_name', Poste='$poste', Collab_email='$collab_email', Collab_type='$collab_type', Salaire='$salaire', Missions='$missions' WHERE idCollaborateur='$idCollaborateur'";
    }
    if($db_connect->query($db_update)===TRUE){
        header('location: home_collab.php');
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
    <meta name="description" content="Modification de Collaborateur">
    <meta name="keywords" content="">
    <meta name="author" content="John Doe">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <title>Modier le client</title>
</head>
<body>
<form class="col-5" method="post" action="modify_collab.php" style="margin-bottom: 20px;">
    <a href="javascript:history.go(-1)">BACK</a>
    <h3>ID du Collaborateur</h3>
    <div class="form-group">
        <label for="idCollaborateur">ID Collaborateur</label>
        <input type="number" class="form-control" id="idCollaborateur" aria-describedby="idCollaborateur" name="idCollaborateur" placeholder="Aa" required>
    </div>
    <h3>Informations à renseigner</h3>
    <div class="form-group">
        <label for="collab_name">Nom Complet</label>
        <input type="text" class="form-control" id="collab_name" aria-describedby="name_modify" name="collab_name" placeholder="Aa" required>
    </div>
    <div class="form-group">
        <label for="poste">Poste</label>
        <input type="text" class="form-control" id="poste" name="poste" placeholder="Aa" required>
    </div>
    <div class="form-group">
        <label for="collab_email">Email</label>
        <input type="email" class="form-control" id="collab_email" name="collab_email" placeholder="johndoe@mail.com" required>
    </div>
    <div class="form-group">
        <label for="collab_type">Addresse</label>
        <select  multiple class="form-control" id="collab_type" name="collab_type" required>
            <optgroup label="Département techniques">
                <option value="Système d’information">Système d’information</option>
            </optgroup>
            <optgroup label="Personnel administratif">
                <option value="Commerciaux">Commerciaux</option>
            </optgroup>
            <optgroup label="Experts techniques">
                <option value="1">Internes</option>
                <option value="0">Externes</option>
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
    <button type="submit" class="btn btn-warning" name="modify_collab">Modifier le collaborateur</button>
</form>
</body>
</html>
