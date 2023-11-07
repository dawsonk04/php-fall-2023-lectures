<?php
session_start();

    if(isset($_POST["txtEmail"])) {
        if (isset($_POST["txtPassword"])) {
            $email = $_POST["txtEmail"];
            $pwd = $_POST["txtPassword"];
            $errormsg = "";



            include '../includes/dbConn.php';

            try {

                $db = new PDO($dsn, $username, $password, $options);


                $sql = $db->prepare("select memberID,memberPassword, MemberKey, RoleID from memberLogin where memberEmail = :Email");
                $sql->bindValue(":Email", $email);

                $sql->execute();
                $row = $sql->fetch();

                if ($row != null) {

                    $hashedPassword = md5($pwd . $row["MemberKey"]);


                    if ($hashedPassword == $row["memberPassword"]) {
                        $_SESSION["UID"] = $row["memberID"];
                        $_SESSION["Role"] = $row["RoleID"];
                        if ($row["RoleID"] == 1) {
                            header("Location:admin.php");

                        } else {
                            header("Location:member.php");

                        }
                    }else {
                        $errormsg = "Wrong Password";
                    }
                } else {
                    $errormsg = "Wrong username";
                }



            } catch (PDOException $e) {
                $error = $e->getMessage();
                echo "Error: $error";
            }



            // Can put this all into one if statement, just chose to do nested if

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
        <th>Email</th>
        <td><input id="txtEmail" name="txtEmail" type="text" size="50"  /></td>
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
