<?php
require "../create/connexion.php";?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="post">
        <h1>RECHERCHE DE LIVRE</h1>
        <label for="title">Recherchez un livre par le titre </label>
        <input type="search" name="title" id="search">
        <br>
        <br>
        <label for="author_id">Recherchez un livre par l'auteur </label>
        <select name="author_id" id="author">
            <option value="">choisir un auteur</option>
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
        <br>
        <label for="genre">Recherchez un livre par le genre </label>
        <input type="search" name="genre" id="genre">
        <br>
        <br>
        <label for="date_edition">Recherchez un livre par la date d'édition </label>
        <input type="search" name="date_edition" id="search">
        <br>
        <br>
        <input type="submit" name="cherche" value="Chercher">
    </form>
    <br>
    <br>
    <a href="../create/creation.php" target="_blank" rel="noopener noreferrer">Créer un livre</a>
    <br>
    <a href="../read/livre.php" target="_blank" rel="noopener noreferrer">Voir tout les livres</a>
    <br>
    <hr>
    <?php
/*echo "
<pre>";
print_r($_POST);
echo "</pre>";*/
if ($_POST) {
    if ($_POST['title']) {
        $titlesearch = $_POST['title'];
        $query = "SELECT `name`, `title`, book.id, `genre`, `date_edition`, `author_id` FROM book INNER JOIN author ON book.author_id=author.id WHERE title LIKE '%$titlesearch%' ORDER BY `title` ASC";

        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo ("Le nom de l'auteur est " . $row['name'] . ".<br>");
            echo ("Le titre est " . $row['title'] . ".<br>");
            echo ("Le genre est " . $row['genre'] . ".<br>");
            echo ("La date d'édition est " . $row['date_edition'] . ".<hr>");

        }}

    if ($_POST['author_id']) {
        $authorsearch = $_POST['author_id'];
        $query = "SELECT `name`, `title`, book.id, `genre`, `date_edition`, `author_id` FROM book INNER JOIN author ON book.author_id=author.id WHERE author_id LIKE '%$authorsearch%' ORDER BY `date_edition` ASC";

        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo ("Le nom de l'auteur est " . $row['name'] . ".<br>");
            echo ("Le titre est " . $row['title'] . ".<br>");
            echo ("Le genre est " . $row['genre'] . ".<br>");
            echo ("La date d'édition est " . $row['date_edition'] . ".<hr>");

        }}

    if ($_POST['genre']) {
        $genresearch = $_POST['genre'];
        $query = "SELECT `name`, `title`, book.id, `genre`, `date_edition`, `author_id` FROM book INNER JOIN author ON book.author_id=author.id WHERE genre LIKE '%$genresearch%' ORDER BY `date_edition` ASC";

        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo ("Le nom de l'auteur est " . $row['name'] . ".<br>");
            echo ("Le titre est " . $row['title'] . ".<br>");
            echo ("Le genre est " . $row['genre'] . ".<br>");
            echo ("La date d'édition est " . $row['date_edition'] . ".<hr>");

        }}

    if ($_POST['date_edition']) {
        $datesearch = $_POST['date_edition'];
        $query = "SELECT `name`, `title`, book.id, `genre`, `date_edition`, `author_id` FROM book INNER JOIN author ON book.author_id=author.id WHERE `date_edition` >='$datesearch' ORDER BY `date_edition` ASC";

        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo ("Le nom de l'auteur est " . $row['name'] . ".<br>");
            echo ("Le titre est " . $row['title'] . ".<br>");
            echo ("Le genre est " . $row['genre'] . ".<br>");
            echo ("La date d'édition est " . $row['date_edition'] . ".<hr>");

        }}}

?>




</body>

</html>