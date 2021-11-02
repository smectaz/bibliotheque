<?php
require "../create/connexion.php";

$query = "SELECT * FROM author ";

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

    <h1>Présentation de nos auteurs</h1>
    <table>


        <?php
while ($row = mysqli_fetch_assoc($result)) {
    ?> <tr>
            <td class="td">
                <?php
echo ($row["name"]); ?>

            </td>
            <td class="td td1">
                <form action="../update/update-auteur.php" method="post">
                    <input type="text" name="id" id="id" value="<?php echo ($row["id"]); ?> " hidden>
                    <input type="text" name="name" id="name" value="<?php echo ($row["name"]); ?> " hidden>

                    <input type="submit" value="modifier">

                </form>
            </td>
            <td class="td">
                <form action="../delete/delete-auteur.php" method="post">

                    <input type="text" name="id" id="id" value="<?php echo ($row["id"]); ?> " hidden>
                    <input type="text" name="name" id="name" value="<?php echo ($row["name"]); ?> " hidden>
                    <button type="submit">Supprimer</button>
                </form>
            </td>

        </tr>
        <?php
}?>


    </table>
    <br>
    <a href="livre.php">Voir les livres</a>
    <br>


    <a href="../create/creation.php">Créer un livre</a>
    <br>
    <a href="auteur.php">Voir les écrivains ou écrivaines
    </a>
    <br>
    <a href="../create/creation-auteur.php">Créer un écrivain ou une écrivaine</a>
    <br>
    <a href="../index.php">Revenir à l'accueil</a>
</body>

</html>