<?php
session_start();

$diceImage = array ("image/dice_1.png","image/dice_2.png","image/dice_3.png",
                    "image/dice_4.png","image/dice_5.png","image/dice_6.png");

function rollDice() { return rand(1,6); }

$yourself = rollDice();
$yourself2 = rollDice();
$yourselfSum = $yourself + $yourself2;

$computer = rollDice();
$computer2 = rollDice();
$computer3 = rollDice();
$computerSum = $computer + $computer2 + $computer3;

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
    <h2> Dice-Roll</h2>
    <?php
        echo "<h2> Youre Score: $yourselfSum </h2>";


        echo "<img src = '../{$diceImage[$yourself-1]}' />";
        echo "<img src = '../{$diceImage[$yourself2-1]}' /> ";

        echo "<h2> Computer score: $computerSum</h2>";
        echo "<img src = '../{$diceImage[$computer-1]}' />";
        echo "<img src = '../{$diceImage[$computer2-1]}' />";
        echo "<img src = '../{$diceImage[$computer3-1]}' />";

        if ($yourselfSum > $computerSum) {
            echo "<h2> You win </h2>";
        }
        elseif ($yourselfSum < $computerSum) {
            echo "<h2> You lose </h2>";
        }
        else { echo "<h2> Its a tie </h2>"; }

    ?>


</main>
<footer> <?php include '../includes/footer.php'; ?> </footer>

</body>
</html>
