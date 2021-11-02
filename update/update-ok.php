 <?php
require "../create/connexion.php";
/*if ($_POST) {

echo "
<pre>";
print_r($_POST);
echo "</pre>
";}*/

if (isset($_POST['oui'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author_id = $_POST['author_id'];
    $genre = $_POST['genre'];
    $date_edition = $_POST['date_edition'];

    $query = "UPDATE `book` SET `title` = '$title', `author_id` = '$author_id', `genre` = '$genre', `date_edition` = '$date_edition' WHERE `book`.`id` = $id";
    $result = mysqli_query($conn, $query);
    echo ("le livre a été modifié");?>
 <br>
 <br>
 <a href="../read/livre.php">Revenir a la liste de livres</a>

 <?php }
/*if ($_POST) {

echo "
<pre>";
print_r($_POST);
echo "</pre>
";}*/

?>