<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../config/config.php';


if ( isset ( $_SERVER['PATH_INFO'] ) ) {
    $dataPath = $_SERVER['PATH_INFO'];
} else {
    $dataPath = '';
}

$routes = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($dataPath, $routes)) {
    http_response_code(404);
    die();
}

session_start();

$psr17Factory = new Psr17Factory();
$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UrlFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory // StreamFactory
);

$request = $creator->fromGlobals();

$classControl = $routes[$dataPath];

/** @var RequestHandlerInterface  $control */
$control = new $classControl();
$received = $control->handle($request);

foreach ($received->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $received->getBody();

$ok = \App\Infrastructure\Persistence\Database::getConnection();
