<?php
    if(isset($_POST["txtTitle"])) {
        if(isset($_POST["txtRating"])) {
            $title = $_POST["txtTitle"];
            $rating = $_POST["txtRating"];


            //database stuff
            include '../includes/dbConn.php';

            try {

                $db = new PDO($dsn, $username, $password, $options);


                $sql = $db->prepare("insert into MovieList (Movie_Title,Movie_Rating) values (:Title,:Rating)");
                $sql->bindValue(":Title",$title);
                $sql->bindValue(":Rating",$rating);

                $sql->execute();






            } catch (PDOException $e) {
                $error = $e->getMessage();
                echo "Error: $error";
            }
        }
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
</head>
<body>
<header> <?php include '../includes/header.php'?></header>
<nav> <?php include '../includes/nav.php'?> </nav>

<main>
    <form method="post">
    <table border="1" width="60%"  style = "margin: auto">
        <tr >
            <th colspan="2">Add New Movie</th>
        </tr>

        <tr>
        <th>Movie Name</th>
        <td><input id="txtTitle" name="txtTitle" type="text" size="50" /></td>
        </tr>

        <tr>
            <th>Movie Rating</th>
            <td><input id="txtRating" name="txtRating" type="text"/></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Add New Movie"/>
            </td>
        </tr>

    </table>
    </form>
</main>
<footer> <?php include '../includes/footer.php'; ?> </footer>

</body>
</html>
