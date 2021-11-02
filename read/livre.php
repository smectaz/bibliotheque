<?php
require "../create/connexion.php";

$query = "SELECT `name`, `title`, book.id, `genre`, `date_edition`, `author_id` FROM book INNER JOIN author ON book.author_id=author.id";

if (isset($_POST['author_id'])) {
    $query .= ' WHERE author.id=' . $_POST['author_id'];
}

$result = mysqli_query($conn, $query);

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    table {
        border-top: solid 1px black;
        border-left: solid 1px black;
        border-right: solid 1px black;

    }

    .td {
        border-bottom: solid 1px black;
    }

    .td1 {
        border-right: solid 1px black;
        border-left: solid 1px black;
    }

    .td3 {
        border-left: solid 1px black;
    }
    </style>
    <title>Document</title>
</head>

<body>
    <?php

$query1 = "SELECT * FROM author";

$result1 = mysqli_query($conn, $query1);

?>
    <form action="#" method="post">
        <label for="author">Auteur du livre</label>

        <select name="author_id" id="author">
            <?php
while ($row = mysqli_fetch_assoc($result1)) {
    ?>
            <option value="
            <?php
echo ($row['id']); ?>
            "><?php
echo ($row['name']); ?></option>
            <?php }?>
        </select>
        <button type="submit">Voir les livres</button>
    </form>
    <br>

    <table>


        <?php
while ($row = mysqli_fetch_assoc($result)) {
    ?> <tr>
            <td class="td">
                <?php
echo ($row["title"]);
    ?>
            </td>
            <td class="td td1">
                <?php
echo ($row["name"]);
    ?>
            </td>
            <td class="td ">
                <?php
echo ($row["genre"]);
    ?>
            </td>
            <td class="td td1">
                <?php
echo ($row["date_edition"]);
    ?>
            </td>
            <td>
                <form action="../update/update.php" method="post">
                    <input type="text" name="id" id="id" value="<?php echo ($row["id"]); ?> " hidden>
                    <input type="text" name="title" id="title" value="<?php echo ($row["title"]); ?> " hidden>
                    <input type="text" name="author_id" id="author_id" value="<?php echo ($row["author_id"]); ?> "
                        hidden>
                    <input type="text" name="name" id="name" value="<?php echo ($row["name"]); ?> " hidden>
                    <input type="text" name="genre" id="genre" value="<?php echo ($row["genre"]); ?> " hidden>
                    <input type="text" name="date_edition" id="date_edition"
                        value="<?php echo ($row["date_edition"]); ?>" hidden>
                    <button type="submit">modifier</button>

                </form>
            </td>
            <td>
                <form action="../delete/delete.php" method="post">
                    <input type="text" name="title" id="title" value="<?php echo ($row["title"]); ?> " hidden>
                    <input type="text" name="id" id="id" value="<?php echo ($row["id"]); ?> " hidden>
                    <button type="submit">Supprimer</button>

                </form>
            </td>

        </tr>
        <?php
}
?>


    </table>
    <br>


    <a href="../create/creation.php">Créer un livre</a>
    <br>
    <a href="../create/creation-auteur.php">Créer un écrivain ou une écrivaine</a>
    <br>
    <a href="auteur.php">Voir les écrivains ou écrivaines
    </a>
    <br>

    <a href="../index.php">Revenir à l'accueil</a>




</body>

</html>