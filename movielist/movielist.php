
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
    <h3> My Movie List</h3>

    <table border="1" width="85%" style = "margin:auto " >
        <tr>
            <th>KEY</th>
            <th>Movie Title</th>
            <th>Rating</th>
        </tr>
    <?php
    include '../includes/dbConn.php';

    try {

        $db = new PDO($dsn, $username, $password, $options);


        $sql = $db->prepare("select * from MovieList");
        $sql->execute();
        $row = $sql->fetch();


        while ($row != null) {

          echo "<tr>";
          echo "<td>" . $row["Movie_ID"] ." </td>";
          echo "<td>" . $row["Movie_Title"] ." </td>";
          echo "<td>" . $row["Movie_Rating"] ." </td>";
          echo "</tr>";


            $row = $sql->fetch();
        }


  } catch (PDOException $e) {
        $error = $e->getMessage();
        echo "Error: $error";
    }

    ?>
    </table>
    <br />
    <a href="movieadd.php">Add New Movie</a>

</main>
<footer> <?php include '../includes/footer.php'; ?> </footer>

</body>
</html>
