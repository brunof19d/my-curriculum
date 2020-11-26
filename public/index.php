<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../config/config.php';

$dataPath = $_SERVER['PATH_INFO'];
$routes = require __DIR__ . '/../config/routes.php';

if ($dataPath === null) {
    header('Location: /home');
    die();
}

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
$serverRequest = $creator->fromGlobals();

$classControl = $routes[$dataPath];
/** @var ContainerInterface $container */
$container = require __DIR__ . '/../config/dependencies.php';
/** @var RequestHandlerInterface $control */
$control = $container->get($classControl);

$received = $control->handle($serverRequest);

foreach ($received->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}
echo $received->getBody();