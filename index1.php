<?php
require_once("vendor/autoload.php");
use Slim\App;
use Slim\Container;

$setting = array(
"setting" => array(
"displayErrorDetails" => true

)

);

$container = new Container($setting);
$app = new App($container);

$app->get("/", function($request, $response){
    $parameter = $request->getQueryParams();
    $tingkat = $parameter["tingkat"];
    $result = array(
        "nama" => $parameter["nama"],
        "perguruan" => $parameter["perguruan"],
        "tingkat" => $tingkat
    );
    return $response->withJson($result);
});

$app->post("/iki", function($request, $response){
    $parameter = $request->getParsedBody();
    $klasmen = $parameter["klasmen"];
    $result = array(
        "team" => $parameter["team"],
        "liga" => $parameter["liga"],
        "klasmen" => $klasmen
    );
    return $response->withJson($result);
});
$app->run();