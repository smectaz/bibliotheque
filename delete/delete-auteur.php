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
    <h1>Voulez vous vraiment supprimer cet écrivain ou cette écrivaine "<?php echo ($_POST['name']); ?>"</h1>
    <form action="#" method="post">

        <input type="text" name="id" id="id" value="<?php echo ($_POST['id']); ?>" hidden>
        <label for="name">Nom de l'écrivain ou de l'écrivaine</label>
        <input type="text" name="name" id="name" value="<?php echo ($_POST['name']); ?>">
        <br>
        <input type="submit" name="oui" value="oui" placeholder="oui">
        <br>
        <button><a href="../read/auteur.php">non</a></button>
    </form>
    <?php
if (isset($_POST['oui'])) {

    $query = "DELETE FROM `author` WHERE `author`.`id` =" . $_POST['id'];
    $result = mysqli_query($conn, $query);
    echo ("l'écrivain ou l'écrivaine  a été supprimé")?>
    <a href="../read/auteur.php">Revenir a la liste d'écrivain ou d'écrivaine</a><?php ;?>

    <?php }

?>
</body>

</html>