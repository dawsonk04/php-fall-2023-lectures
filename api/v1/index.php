<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

// put = update , post = insert , get = select , delete = delete

$app = new \Slim\Slim();
$app->get('/showMember/:MemberName','showMember');
$app->post('/addMember/:MemberName','addMember');
$app->get('/getHello', 'getHello');
$app->post('/addJson','addJson');

// homework start -- 11/6/2023

$app->get('/get_races','get_races');
$app->get('/get_runners/:race_id','get_runners');
$app->post('/add_runner','add_runner');
$app->delete('/delete_runner','delete_runner');

$app->run();

function getHello () {
    echo "Hello World";
}

function showMember($MemberName) {
    echo "Hello $MemberName";
}

function addMember($MemberName){
    echo "hello $MemberName";
}

function addJson() {
    $request = \Slim\Slim::getInstance()->request();
    $post_Json = json_decode($request->getBody(),TRUE);

    echo $post_Json["fname"]; //-- can structure / look for certain things , address and last name etc;
}

//homework methods -- 11/6/2023
function add_runner() {
    $request = \Slim\Slim::getInstance()->request();
    $post_Json = json_decode($request->getBody(),TRUE);

    $memberID =  $post_Json["memberID"];
    $raceID =  $post_Json["raceID"];
    $memberKey = $post_Json["memberKey"];

    include ('../../includes/dbConn.php');
    try {

        $db = new PDO($dsn, $username, $password, $db_options);


        $sql = $db->prepare(" 
            select member_race.raceID from member_race
            inner join memberLogin on member_race.memberID = memberLogin.memberID
            where
            member_race.raceID = 2 and
            memberLogin.MemberKey = :apiKey
        ");

        $sql->bindValue(":apiKey",$memberKey);
        $sql->execute();
        $results = $sql->fetch();

       if ($results==null) {
            echo "Bad API key";
       }
       else {
           $sql = $db->prepare(" 
            insert into member_race (memberID,raceID,RoleID) values (:memberID,:raceID,3)
        ");

           $sql->bindValue(":memberID",$memberID);
           $sql->bindValue(":raceID",$raceID);
           $sql->execute();

       }

        $results = null;
        $db = null;

    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo json_encode($error);
    }


}


function delete_runner() {
    $request = \Slim\Slim::getInstance()->request();
    $post_Json = json_decode($request->getBody(), TRUE);

    $memberID = $post_Json["memberID"];
    $raceID = $post_Json["raceID"];
    //$memberKey = $post_Json["memberKey"];

    include('../../includes/dbConn.php');
    try {

        $db = new PDO($dsn, $username, $password, $db_options);

        $sql = $db->prepare("
            DELETE FROM member_race
            WHERE memberID = :memberID AND raceID = :raceID
        ");

        $sql->bindValue(":memberID", $memberID);
        $sql->bindValue(":raceID", $raceID);
        $sql->execute();

        $affectedRows = $sql->rowCount();

        if ($affectedRows == 0) {
            echo "No matching record found to delete.";
        } else {
            echo "Runner deleted successfully.";
        }

        $db = null;

    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo json_encode($error);
    }
}


function get_races() {
    include ('../../includes/dbConn.php');
            try {

                $db = new PDO($dsn, $username, $password, $db_options);


                $sql = $db->prepare("select * from race ");

                $sql->execute();
                $results = $sql->fetchAll();

                echo '{"Races":' . json_encode($results) . '}';

                $results = null;
                $db = null;

            } catch (PDOException $e) {
                $error = $e->getMessage();
                echo json_encode($error);
            }

            // error above I think, same code tried picking through JSON error code but really couldnt find anything, possibly pathing error?

            // Can put this all into one if statement, just chose to do nested if

        }

function get_runners($race_id) {
    include ('../../includes/dbConn.php');
    try {

        $db = new PDO($dsn, $username, $password, $db_options);


        $sql = $db->prepare(" 
            select distinct memberLogin.memberName, memberLogin.memberEmail from
            memberLogin inner join member_race on memberLogin.memberID = member_race.memberID
            where member_race.raceID = :raceID
        ");

        $sql->bindValue(":raceID",$race_id);
        $sql->execute();
        $results = $sql->fetchAll();

        echo '{"Runners":' . json_encode($results) . '}';

        $results = null;
        $db = null;

    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo json_encode($error);
    }

    }



?>
