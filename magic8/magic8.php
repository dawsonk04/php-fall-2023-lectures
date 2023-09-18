<?php
session_start();

    // checking if question was asked
    if(isset($_POST["txtQuestion"])) {  $question = $_POST["txtQuestion"]; }
    else {
        $question = "";
    }
    if(isset($_SESSION["PrevQuestion"])) { $PrevQuest = $_SESSION["PrevQuestion"]; }
    else { $PrevQuest = ""; }

    $answer = "Ask me a question?";
    $responses = array("Ask again later","Yes","No","It appears to be so",
                       "Reply is hazy, please try again","Yes definitely","What is it you really to know ",
                        "Outlook is good", "My sources say no", "Signs point to yes","Dont count on it",
                        "Cannot predict now", "As I see it yes", "Better not tell you know", "Concentrate and ask again");

    if($question == "") { $answer="Ask me a question"; }
    elseif(substr($question,-1)!="?") {$answer = "ask me with a question mark";}
    elseif($PrevQuest ==$question) { $answer = "Please ask a new question"; }
    else {  $iResponse = rand(0,14);
            $answer = $responses[$iResponse];
            $_SESSION["PrevQuestion"] = $question;
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
    <h2>Magic-8-Ball</h2>
    <br/>
        <marquee><?=$answer?></marquee>
    <br />

    <p> Ask and question:  <br />
            <form method="post" action="magic8.php">
                <input type="text" name="txtQuestion" id="txtQuestion" value="<?=$question?>"/> </p>
        <input type="submit" value="ask the 8 ball" >
    </form>


</main>
<footer> <?php include '../includes/footer.php'; ?> </footer>

</body>
</html>
