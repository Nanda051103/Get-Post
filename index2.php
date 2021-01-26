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
    $ram = $parameter["ram"];
    $result = array(
        "merk" => $parameter["merk"],
        "spek" => $parameter["spek"],
        "ram" => $ram
    );
    return $response->withJson($result);
});

$app->post("/iku", function($request, $response){
    $parameter = $request->getParsedBody();
    $nama = $parameter["nama"];
    $result = array(
        "asaltim" => $parameter["asaltim"],
        "negara" => $parameter["negara"],
        "nama" => $nama
    );
    return $response->withJson($result);
});
$app->run();