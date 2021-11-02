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

    <h1>Voulez vous modifier ce livre "<?php echo ($_POST['title']); ?>"</h1>
    <form action="update-ok.php" method="post">
        <input type="text" name="id" id="id" value="<?php echo ($_POST["id"]); ?> " hidden>
        <label for="title">Titre du livre</label>
        <input type="text" name="title" id="title" value="<?php echo ($_POST['title']); ?>">
        <label for="author_id">Auteur du livre</label>
        <select name="author_id" id="author">
            <?php
if (isset($_POST["author_id"])) {?>
            <option value="<?php echo ($_POST['author_id']); ?>"><?php echo ($_POST['name']); ?></option>
            <?php }
$author_id = $_POST['author_id'];
$query2 = "SELECT * FROM `author` WHERE id != $author_id";

$result2 = mysqli_query($conn, $query2);

while ($row1 = mysqli_fetch_assoc($result2)) {
    ?>
            <option value="<?php echo ($row1['id']); ?>"><?php echo ($row1['name']); ?></option>
            <?php }?>
        </select>
        <label for="genre">Genre du livre</label>
        <input type="text" name="genre" id="genre" value="<?php echo ($_POST['genre']); ?>">
        <label for="date_edition">Année d'édition du livre</label>
        <input type="text" name="date_edition" id="date" value="<?php echo ($_POST['date_edition']); ?>">
        <br>
        <input type="submit" name="oui" value="oui">
        <br>
        <button><a href=" ../read/livre.php">Ne rien toucher</a></button>
    </form>

</body>

</html>