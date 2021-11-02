<?php
require "../create/connexion.php";
/*if ($_POST) {

echo "
<pre>";
print_r($_POST);
echo "</pre>
";}*/

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

    <h1>Voulez vous vraiment supprimer ce livre "<?php echo ($_POST['title']); ?>"</h1>
    <form action="#" method="post">

        <input type="text" name="id" id="id" value="<?php echo ($_POST['id']); ?>" hidden>
        <label for="title">Titre du livre</label>
        <input type="text" name="title" id="title" value="<?php echo ($_POST['title']); ?>">
        <br>
        <input type="submit" name="oui" value="oui" placeholder="oui">
        <br>
        <button><a href="../read/livre.php">non</a></button>
    </form>
    <?php

if (isset($_POST['oui'])) {
    $query = "DELETE FROM `book` WHERE book.id =" . $_POST['id'];
    $result = mysqli_query($conn, $query);
    echo ("le livre a été supprimé")?>
    <a href="../read/livre.php">Revenir a la liste de livres</a><?php ;?>

    <?php }

?>
</body>

</html>