<?php

include '../includes/dbConn.php';



    if(isset($_POST["txtTitle"])) {
        if (isset($_POST["txtRating"])) {
            $title = $_POST["txtTitle"];
            $rating = $_POST["txtRating"];
            $id = $_POST["txtID"];


            //database stuff

            try {

                $db = new PDO($dsn, $username, $password, $options);


                $sql = $db->prepare("update MovieList set Movie_Title = :Title, Movie_Rating = :Rating where Movie_ID = :ID ");
                $sql->bindValue(":Title", $title);
                $sql->bindValue(":Rating", $rating);
                $sql->bindValue(":ID", $id);


                $sql->execute();


            } catch (PDOException $e) {
                $error = $e->getMessage();
                echo "Error: $error";
            }
            header("Location:movielist.php");
        }
    }

    if (isset($_GET["id"])) {
    $id = $_GET["id"];

    try {

        $db = new PDO($dsn, $username, $password, $options);


        $sql = $db->prepare("select * from MovieList where Movie_ID = :id");
        $sql->bindValue(":id",$id);

        $sql->execute();
        $row = $sql->fetch();


        $rating = $row["Movie_Rating"];
        $title = $row["Movie_Title"];

    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo "Error: $error";
    }

    } else {
    header("Location:movielist.php");
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dawson's Webpage</title>
    <link type="text/css" rel="stylesheet" href="../css/base.css">

    <script type="text/javascript">
        function DeleteMovie(title, id) {
            if(confirm("Do you want to delete " + title)) {

                document.location.href = "moviedelete.php?id=" + id;


            }
        }
    </script>

</head>
<body>
<header> <?php include '../includes/header.php'?></header>
<nav> <?php include '../includes/nav.php'?> </nav>

<main>
    <form method="post">
    <table border="1" width="60%"  style = "margin: auto">
        <tr >
            <th colspan="2">Update Movie</th>
        </tr>

        <tr>
        <th>Movie Name</th>
        <td><input id="txtTitle" name="txtTitle" type="text" size="50" value="<?=$title?>" /></td>
        </tr>

        <tr>
            <th>Movie Rating</th>
            <td><input id="txtRating" name="txtRating" type="text" value="<?=$rating?>"/></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Update Movie"/> | <input type="button" onclick="DeleteMovie('<?=$title?>',<?=$id?>)" value="Delete Movie">
            </td>
        </tr>


    </table>
        <input type="hidden" id="txtID" name="txtID" value="<?=$id?>">
    </form>
</main>
<footer> <?php include '../includes/footer.php'; ?> </footer>

</body>
</html>
