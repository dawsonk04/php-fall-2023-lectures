<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

// put = update , post = insert , get = select , delete = delete

$app = new \Slim\Slim();
$app->get('/showMember/:MemberName','showMember');
$app->post('/addMember/:MemberName','addMember');
$app->get('/getHello', 'getHello');
$app->post('/addJson','addJson');

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

?>
