<?php
    if(isset($_POST['txtFirstName'])) {
        if(isset($_POST['txtLastName'])) {
            if(isset($_POST['txtAddress'])){
                if(isset($_POST['txtCity'])){
                    if(isset($_POST['txtState'])){
                        if(isset($_POST['txtZip'])) {
                            if(isset($_POST['txtPhone'])) {
                                if(isset($_POST['txtEmail'])) {
                                    if(isset($_POST['txtPassword'])){
                                        $FirstName = $_POST['txtFirstName'];
                                        $LastName = $_POST['txtLastName'];
                                        $Address = $_POST['txtAddress'];
                                        $City = $_POST['txtCity'];
                                        $State = $_POST['txtState'];
                                        $Zip = $_POST['txtZip'];
                                        $Phone = $_POST['txtPhone'];
                                        $Email = $_POST['txtEmail'];
                                        $PasswordFake = 'SECRET';
                                        $Password = $_POST['txtPassword'];

                                        include '../includes/dbConn.php';

                                        try {

                                            $db = new PDO($dsn, $username, $password, $options);


                                            $sql = $db->prepare("insert into CustomerList (FirstName,LastName, Address, City, State, Zip, Phone, Email, Password) 
                                            values (:FirstName,:LastName,:Address,:City,:State,:Zip,:Phone,:Email,:Password)");

                                            $sql->bindValue(":FirstName",$FirstName);
                                            $sql->bindValue(":LastName",$LastName);
                                            $sql->bindValue(":Address",$Address);
                                            $sql->bindValue(":City",$City);
                                            $sql->bindValue(":State",$State);
                                            $sql->bindValue(":Zip",$Zip);
                                            $sql->bindValue(":Phone",$Phone);
                                            $sql->bindValue(":Email",$Email);
                                            $sql->bindValue(":Password",$Password);


                                            $sql->execute();






                                        } catch (PDOException $e) {
                                            $error = $e->getMessage();
                                            echo "Error: $error";
                                        }


                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    include '../includes/dbConn.php';


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
                <th colspan="2">Add New Customer</th>
            </tr>

            <tr>
                <th>FirstName</th>
                <td><input id="txtFirstName" name="txtFirstName" type="text" size="50" maxlength="15" required /></td>
            </tr>

            <tr>
                <th>LastName</th>
                <td><input id="txtLastName" name="txtLastName" type="text" size="50" maxlength="15" required/></td>
            </tr>

            <tr>
                <th>Address</th>
                <td><input id="txtAddress" name="txtAddress" type="text" size="50" maxlength="25" required/></td>
            </tr>

            <tr>
                <th>City</th>
                <td><input id="txtCity" name="txtCity" type="text" size="50" maxlength="10" required/></td>
            </tr>

            <tr>
                <th>State</th>
                <td><input id="txtState" name="txtState" type="text" size="50" maxlength="2" required/></td>
            </tr>

            <tr>
                <th>Zip</th>
                <td><input id="txtZip" name="txtZip" type="text" size="50" maxlength="5" required/></td>
            </tr>

            <tr>
                <th>Phone</th>
                <td><input id="txtPhone" name="txtPhone" type="text" size="50" maxlength="20" required/></td>
            </tr>

            <tr>
                <th>Email</th>
                <td><input id="txtEmail" name="txtEmail" type="text" size="50" maxlength="25" required/></td>
            </tr>

            <tr>
                <th>Password</th>
                <td><input id="txtPassword" name="txtPassword" type="text" size="50" maxlength="20" required/></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" value="Add New Customer"/>
                </td>
            </tr>

        </table>
    </form>
</main>
<footer> <?php include '../includes/footer.php'; ?> </footer>

</body>
</html>
