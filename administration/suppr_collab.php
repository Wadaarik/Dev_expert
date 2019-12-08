<?php
include 'config.php';

if(isset($_POST['suppr_collab']))
{
    $idClient = mysqli_real_escape_string($db_connect, $_POST['idCollaborateur']);

    if (count($errors) == 0) {
        $db_suppr = "DELETE FROM collaborateur WHERE idCollaborateur='$idClient'";
        $res_suppr = mysqli_query($db_connect, $db_suppr);
        if ($res_suppr == FALSE) {
            echo "Echec de l'exécution de la requête.<br />";
        }
        else {
            echo "Personne supprimée.<br />";
            header('location: home_collab.php');
        }
    }
}

?>
<!Doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Suppression de clients">
    <meta name="keywords" content="">
    <meta name="author" content="John Doe">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <title>Supprimer le collaborateur</title>
</head>
<body>
<form class="col-5" method="post" action="suppr_collab.php" style="margin-bottom: 20px;">
    <a href="javascript:history.go(-1)">BACK</a>
    <h3>ID du client</h3>
    <div class="form-group">
        <label for="idCollaborateur">ID Collaborateur</label>
        <input type="number" class="form-control" id="idCollaborateur" aria-describedby="idCollaborateur" name="idCollaborateur" placeholder="1">
    </div>
    <button type="submit" class="btn btn-danger" name="suppr_collab">Supprimer le collaborateur</button>
</form>
</body>
</html>
