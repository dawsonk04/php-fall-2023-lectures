<?php
/*
 countdown until end of semester
 */

$secPerMin = 60;
$secPerHour = 60 * $secPerMin;
$secPerDay = 24 * $secPerHour;
$secPerYear = 365 * $secPerDay;
// current time
$now = time();
// time until new years 2024
$EndSem = mktime(12,0,0,12,11,2023);
// number of seconds between now and then --> new years
$seconds = $EndSem - $now;
$Years = floor($seconds / $secPerYear);
$seconds = $seconds - ($Years * $secPerYear);

$Days = floor($seconds / $secPerDay);
$seconds = $seconds - ($secPerDay * $Days);

$Hours = floor($seconds / $secPerHour);
$seconds = $seconds - ($Hours * $secPerHour);

$Minutes = floor($seconds / $secPerMin);
$seconds = $seconds - ($Minutes * $secPerMin);

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

<main style="text-align: center">
    <h3> End of semester</h3>

    <p>years: <?= $Years ?> | days: <?=$Days?> | hours: <?= $Hours ?> | minutes: <?= $Minutes ?>
    | seconds: <?= $seconds ?>
    </p>

</main>
<footer> <?php include '../includes/footer.php'; ?> </footer>

</body>
</html>


