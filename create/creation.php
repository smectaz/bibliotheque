<?php
require "connexion.php";

if (!empty($_POST['title']) && !empty($_POST['author_id']) && !empty($_POST['genre']) && !empty($_POST['date_edition'])) {
    /*echo "
    <pre>";
    print_r($_POST);
    echo "</pre>";*/

    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = $_POST["author_id"];
    $genre = $_POST["genre"];
    $date = $_POST["date_edition"];

    $query1 = "INSERT INTO book (`id`, `title`, `author_id`, `genre`, `date_edition`, `editor`) VALUES (NULL, '$title', '$author', '$genre', $date, NULL);";
    $result = mysqli_query($conn, $query1);
    echo ("Le livre a été crée");
}

//$_post est une superglobale qui nous permet de recuperer les saisie d'un formulaire
/*echo "
<pre>";
print_r($_POST);
echo "</pre>";*/
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Document</title>
</head>

<body>

    <h1>ENTREE D'UN LIVRE</h1>
    <form action="#" method="post">
        <label for="title">Titre du livre</label>

        <?php
if (empty($_POST)) {?>
        <input type="text" name="title" id="title">
        <?php }

if ($_POST) {
    if (empty($_POST['title'])) {?>
        <input type="text" name="title" id="title">
        <?php
echo ("<br>vous devez mettre un titre");
    }
    if (!empty($_POST['title'])) { ?>
        <input type="text" name="title" id="title" value="<?php echo ($_POST['title']); ?>" />
        <?php }}?>
        <br>
        <br>
        <label for="author">Auteur du livre</label>

        <?php
if (empty($_POST)) {
    ?>

        <select name="author_id" id="author">
            <option value="">choisir un auteur</option>
            <?php
$query = "SELECT * FROM author";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <option value="<?php echo ($row['id']); ?>">
                <?php echo ($row['name']); ?></option>
            <?php }}?>
        </select>
        <?php
if ($_POST) {
    if (empty($_POST['author_id'])) {?>
        <select name="author_id" id="author">
            <option value="">Choisir un auteur</option>
            <?php
$query = "SELECT * FROM author";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?php echo ($row['id']); ?>">
                <?php echo ($row['name']); ?></option>
            <?php }?>
        </select>
        <br>
        <?php echo ("Vous devez mettre un auteur");}

    if (!empty($_POST["author_id"])) {
        $author_id = $_POST["author_id"];
        $query1 = "SELECT * FROM `author` WHERE id = $author_id";

        $result1 = mysqli_query($conn, $query1);

        $row1 = mysqli_fetch_assoc($result1) ?>
        <select name="author_id" id="author">
            <option value="<?php echo ($row1['id']); ?>"><?php echo ($row1['name']); ?></option>
            <?php

        $query2 = "SELECT * FROM `author` WHERE id != $author_id";

        $result2 = mysqli_query($conn, $query2);

        while ($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <option value="<?php echo ($row2['id']); ?>"><?php echo ($row2['name']); ?></option>
            <?php }}}?>
        </select>


        <br>
        <br>
        <label for="genre">Genre du livre</label>
        <?php
if (empty($_POST)) {?>
        <input type="text" name="genre" id="genre">
        <?php }

if ($_POST) {
    if (empty($_POST['genre'])) {?>
        <input type="text" name="genre" id="genre">
        <?php
echo ("<br>vous devez mettre un genre");
    }
    if (!empty($_POST['genre'])) { ?>
        <input type="text" name="genre" id="genre" value="<?php echo ($_POST['genre']); ?>" />
        <?php }}?>
        <br>
        <br>
        <label for="date">année d'édition</label>
        <?php
if (empty($_POST)) {?>
        <input type="text" name="date_edition" id="date_edition">
        <?php }

if ($_POST) {
    if (empty($_POST['date_edition'])) {?>
        <input type="text" name="date_edition" id="date_edition">
        <?php
echo ("<br>vous devez mettre une date d'édition");
    }
    if (!empty($_POST['date_edition'])) { ?>
        <input type="text" name="date_edition" id="date_edition" value="<?php echo ($_POST['date_edition']); ?>" />
        <?php }}?>
        <br>
        <br>
        <label for="editor">Maison d'édition</label>
        <input type="text" name="editor" id="editor" />
        <br>
        <br>
        <button type="submit">creer</button>
    </form>
    <br>

    <a href="../read/livre.php">Voir nos livres</a>
</body>

</html>