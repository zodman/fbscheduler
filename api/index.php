<?php 
require 'vendor/autoload.php';

R::setup();   

Flight::set('flight.log_errors', true);

Flight::route('/', function(){
    echo 'first / route matched';
});

Flight::route("/api/list/", function(){

    $resp = [
        array("id"=>1, 'url'=>"url1", 'created_at'=>date("Y-m-d H:i:s")),
        array("id"=>2, 'url'=>"url2", 'created_at'=>date("Y-m-d H:i:s")),
        array("id"=>3, 'url'=>"url3", 'created_at'=>date("Y-m-d H:i:s")),

    ];
    Flight::json($resp);
});

Flight::route("/api/add/", function(){
    $req = Flight::request();
    var_dump($req->data);
    $u = R::dispense("urls");
    $u->url = $req->data->url;
    R::store($u);
    $resp = "ok";
    Flight::json($resp);
});


Flight::start();
