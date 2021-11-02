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
    $name = $_POST['name'];

    $query = "UPDATE `author` SET `name` = '$name' WHERE `author`.`id` = $id";
    $result = mysqli_query($conn, $query);
    echo ("l'écrivain ou l'écrivaine  a été modifié");?>
 <br>
 <br>
 <a href="../read/auteur.php">Revenir a la liste des écrivain ou écrivaine</a>

 <?php }
/*if ($_POST) {

echo "
<pre>";
print_r($_POST);
echo "</pre>
";}*/

?>