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

<table border="1" width="85%" style="margin: auto">
    <tr>
        <th>CustomerID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Password</th>

    </tr>


<main>
    <h3> Customer List</h3>

    <?php
         include '../includes/dbConn.php';

    try {

        $db = new PDO($dsn, $username, $password, $options);


        $sql = $db->prepare("select * from CustomerList");
        $sql->execute();
        $row = $sql->fetch();


        while ($row != null) {

        $hashedPassword = md5($password);

            echo "<tr>";
            echo "<td>" . $row["CustomerID"] ." </td>";
            echo "<td> <a href='customerupdate.php?id=". $row["CustomerID"] ."'> " . $row["FirstName"] ."</a> </td>";
            echo "<td>" . $row["LastName"] ." </td>";
            echo "<td>" . $row["Address"] ." </td>";
            echo "<td>" . $row["City"] ." </td>";
            echo "<td>" . $row["State"] ." </td>";
            echo "<td>" . $row["Zip"] ." </td>";
            echo "<td>" . $row["Phone"] ." </td>";
            echo "<td>" . $row["Email"] ." </td>";
            echo "<td>" . $row["Password"] ." </td>";
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

<a href = "customeradd.php" style="text-align: center">Add Customer</a>
</main>
<footer> <?php include '../includes/footer.php'; ?> </footer>

</body>
</html>
