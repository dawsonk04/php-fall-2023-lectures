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
    <form method="post">

        <table border="1" width="60%"  style = "margin: auto">
            <tr >
                <th colspan="2">Add New Member </th>
            </tr>

            <tr>
                <th>Full Name</th>
                <td><input id="txtFName" name="txtFName" type="text" size="50" /></td>
            </tr>

            <tr>
                <th>Email</th>
                <td><input id="txtEmail" name="txtEmail" type="text" size="50" /></td>
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

                        <option value="Admin">Admin</option>
                        <option value="Operator">Operator</option>
                        <option value="Member">Member</option>

                    </select>

                </td>
            </tr>



            <tr>
                <td colspan="2">
                    <input type="submit" value="Add New Member"/>
                </td>
            </tr>
        </table>
    </form>
</main>
<footer> <?php include '../includes/footer.php'; ?> </footer>

</body>
</html>
