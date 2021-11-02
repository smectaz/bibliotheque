<?php
require "../create/connexion.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Voulez vous modifier cet écrivain ou cette écrivaine"<?php echo ($_POST['name']); ?>"</h1>
    <form action="update-auteur-ok.php" method="post">
        <input type="text" name="id" id="id" value="<?php echo ($_POST["id"]); ?> " hidden>
        <label for="name">Titre du livre</label>
        <input type="text" name="name" id="name" value="<?php echo ($_POST['name']); ?>">
        <br>
        <input type="submit" name="oui" value="oui"">
        <br>
        <button><a href=" ../read/auteur.php">Ne rien toucher</a></button>
    </form>
</body>

</html>