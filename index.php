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
    $provinsi = $parameter["provinsi"];
    $result = array(
        "kecamatan" => $parameter["kecamatan"],
        "kabupaten" => $parameter["kabupaten"],
        "provinsi" => $provinsi
    );
    return $response->withJson($result);
});

$app->post("/post", function($request, $response){
    $parameter = $request->getParsedBody();
    $namakakak = $parameter["nama-kakak"];
    $result = array(
        "nama-ayah" => $parameter["nama-ayah"],
        "nama-ibu" => $parameter["nama-ibu"],
        "nama-kakak" => $namakakak
    );
    return $response->withJson($result);
});
$app->run();