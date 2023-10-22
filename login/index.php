<?php

    if(isset($_POST["txtUserName"])) {
        if (isset($_POST["txtPassword"])) {
            $userName = $_POST["txtUserName"];
            $password = $_POST["txtPassword"];
            $errormsg = "";

            // Can put this all into one if statement, just chose to do nested if
            if (strtolower($userName) == "admin") {
                if ($password == "p@ss") {
                    header("Location:admin.php");

                }
            } else {
                if (strtolower($userName) == "user") {
                    if ($password == "p@ss") {
                        header("Location:member.php");

                    }
                } else {
                    $errormsg = "Wrong Username or Password";
                }


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
        <h3 id="error"><?=$errormsg?></h3>
    <table border="1" width="60%"  style = "margin: auto">
        <tr >
            <th colspan="2">User Login </th>
        </tr>

        <tr>
        <th>User Name</th>
        <td><input id="txtUserName" name="txtUserName" type="text" size="50"  /></td>
        </tr>

        <tr>
            <th>Password</th>
            <td><input id="txtPassword" name="txtPassword" type="password" size="50" /></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Login"/>
            </td>
        </tr>


    </table>

    </form>
</main>
<footer> <?php include '../includes/footer.php'; ?> </footer>

</body>
</html>
