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

<main style="text-align: center"><?php
    $number1 = 100;
    $number2 = 50;
    $number = $number1 + $number2;

    echo "<h1>$number</h1>";

    $i = 1;
    while($i < 7) {
        echo "<h$i> Hello world </h$i>";
        $i++;
    }

    $i = 6;
    do {
        echo "<h$i> Hello world </h$i>";
        $i--;
    } while($i > 0);

    for($i = 1; $i < 7; $i++) {
        echo "<h$i>Hello world</h$i>";
    }
    echo "<br /> <br /> <hr />  <hr /> ";
    $full_name = "john smith";
    $position = strpos($full_name, ' ');
        echo $position;
    echo "<br /> <br /> <hr />  <hr /> ";
    echo "<br /> <br /> <hr />  <hr /> ";
        echo $full_name;
        echo "<br />";
        $full_name = strtoupper($full_name);
        echo $full_name;
    echo "<br /> <br /> <hr /> <hr /> ";

    $namePart = explode(' ',$full_name);
    echo $namePart[0];
        echo "<br />";
    echo $namePart[1];
    ?>
</main>
<footer> <?php include '../includes/footer.php' ?> </footer>

</body>
</html>
