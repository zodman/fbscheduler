<?php 
require 'vendor/autoload.php';

Flight::set('flight.log_errors', true);
Flight::route('/', function(){
    echo 'first / route matched';
});

Flight::route("/api/list/", function(){

    $resp = [
        array("id"=>1, 'url'=>"url1", 'created_at'=>date("Y-m-d H:i:s"))
        array("id"=>2, 'url'=>"url2", 'created_at'=>date("Y-m-d H:i:s"))
        array("id"=>3, 'url'=>"url3", 'created_at'=>date("Y-m-d H:i:s"))

    ];
    Flight::json($resp);
});

Flight::start();
