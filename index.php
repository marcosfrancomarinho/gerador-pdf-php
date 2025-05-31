<?php
require_once __DIR__ . "/vendor/autoload.php";
set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, 0, $severity, $file, $line);
});

use App\application\usecase\GeneretorPdfHandler;
use App\infrastructure\http\SlimHttpServer;
use App\infrastructure\pdf\DomCreatorPdf;
use App\infrastructure\pdf\TcCreatorPdf;
use App\presentation\controllers\CreatorPdfControllers;
use App\presentation\routers\Routers;

function main(): void
{
    $CreatorPdf = new DomCreatorPdf() ?? new TcCreatorPdf();
    $GeneretorPdfHandler = new GeneretorPdfHandler($CreatorPdf);
    $CreatorPdfControllers = new CreatorPdfControllers($GeneretorPdfHandler);
    $HttpServer = new SlimHttpServer();
    $Routers = new Routers($HttpServer);
    $Routers->register($CreatorPdfControllers);
    $HttpServer->listen();
}
main();
