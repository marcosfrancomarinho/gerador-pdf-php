<?php
require_once __DIR__ . "/vendor/autoload.php";
set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, 0, $severity, $file, $line);
});

use App\infrastructure\http\SlimHttpServer;
use App\presentation\routers\Routers;
use App\shared\Container\Container;

function main(): void
{
    $httpServer = new SlimHttpServer();
    $container = new Container();
    $routers = new Routers($httpServer);
    $routers->register($container);
    $httpServer->run();
}
main();
