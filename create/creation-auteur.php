<?php
require "connexion.php";

if (!empty($_POST['name'])) {
    /*echo "
    <pre>";
    print_r($_POST);
    echo "</pre>";*/

    $name = $_POST["name"];

    $query1 = "INSERT INTO author (`id`, `name`) VALUES (NULL, '$name');";
    $result = mysqli_query($conn, $query1);
    echo ("L'auteur a été crée");
}?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ENTREE D'UN AUTEUR</h1>
    <form action="#" method="post">
        <label for="name">Nom de l'auteur</label>

        <?php
if (empty($_POST)) {?>
        <input type="text" name="name" id="name">
        <?php }

if ($_POST) {
    if (empty($_POST['name'])) {?>
        <input type="text" name="name" id="name">
        <?php
echo ("<br>vous devez mettre un auteur");
    }
    if (!empty($_POST['name'])) { ?>
        <input type="text" name="name" id="name" value="<?php echo ($_POST['name']); ?>" />
        <?php }}?>
        <br>
        <button type="submit">creer</button>
    </form>
    <a href="../read/auteur.php">Voir les écrivains ou les écrivaines</a>
</body>

</html>