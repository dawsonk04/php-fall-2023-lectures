<?php
session_start();
$errmsg = "";
$key = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));


if ($_SESSION["Role"] !=1) {
    header("Location:index.php");
}

if (isset($_POST["submit"])) {

        if (empty($_POST["txtFName"])) {
            $errmsg = "name is required";
        } else {
            $FName = $_POST["txtFName"];
        }

        if (empty($_POST["txtEmail"])) {
            $errmsg = "email is required";
        } else {
            $Email = $_POST["txtEmail"];
        }

        if (empty($_POST["txtPassword"])) {
            $errmsg = "password is required";
        } else {
            $Password = $_POST["txtPassword"];
        }

        if($Password != $_POST["txtPassword2"] ) {
            $errmsg = "passwords do not match";
        }


        if (empty($_POST["txtRole"])) {
            $errmsg = "role is required";
        } else {
            $Role = $_POST["txtRole"];
        }

        if ($errmsg = "") {
            //do database stuff
        }
            include '../includes/dbConn.php';

        try {

            $db = new PDO($dsn, $username, $password, $options);


            $sql = $db->prepare("insert into memberLogin (memberName,memberEmail,memberPassword,RoleID,MemberKey) 
                                       values (:Name,:Email,:Password,:RID,:Key)");
            $sql->bindValue(":Name",$FName);
            $sql->bindValue(":Email",$Email);
            $sql->bindValue(":Password",md5($Password.$key));
            $sql->bindValue(":RID",$Role);
            $sql->bindValue(":Key", $key);




            $sql->execute();


        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Error: $error";
        }
        $FName = "";
        $Email = "";
        $Password = "";
        $Role = "";

        $errmsg = "Member Added to database";

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
    <h1>Admin Page</h1>
    <h3 id="error"><?=$errmsg?></h3>
    <form method="post">

        <table border="1" width="60%"  style = "margin: auto">
            <tr >
                <th colspan="2">Add New Member </th>
            </tr>

            <tr>
                <th>Full Name</th>
                <td><input id="txtFName" name="txtFName" value="<?=$FName?>" type="text" size="50" required /></td>
            </tr>

            <tr>
                <th>Email</th>
                <td><input id="txtEmail" name="txtEmail" value="<?=$Email?>" type="text" size="50" required /></td>
            </tr>

            <tr>
                <th>Password</th>
                <td><input id="txtPassword" name="txtPassword" type="password" size="50" /></td>
            </tr>

            <tr>
                <th>Retype Password</th>
                <td><input id="txtPassword2" name="txtPassword2" type="password" size="50" /></td>
            </tr>

            <tr>
                <th>Role</th>
                <td>
                    <select id="txtRole" name="txtRole">

                        <option value="1">Admin</option>
                        <option value="2">Operator</option>
                        <option value="3">Member</option>

                    </select>

                </td>
            </tr>



            <tr>
                <td colspan="2">
                    <input type="submit" value="Add New Member" name="submit"/>
                </td>
            </tr>
        </table>
    </form>
</main>
<footer> <?php include '../includes/footer.php'; ?> </footer>

</body>
</html>
