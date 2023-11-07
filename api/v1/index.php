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
$app->put('/update_runner','update_runner');

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

   // echo $post_Json["fname"] -- can structure / look for certain things , address and last name etc;
}

//homework methods -- 11/6/2023
function add_runner() {
    $request = \Slim\Slim::getInstance()->request();
    $post_Json = json_decode($request->getBody(),TRUE);
}
function delete_runner() {
    $request = \Slim\Slim::getInstance()->request();
    $post_Json = json_decode($request->getBody(),TRUE);
}
function update_runner() {
    $request = \Slim\Slim::getInstance()->request();
    $post_Json = json_decode($request->getBody(),TRUE);
}

function get_races() { Echo "Races here!";}

function get_runners($race_id) { Echo "Running number $race_id"; }



?>
