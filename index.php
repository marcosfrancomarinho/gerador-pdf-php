<?php
require_once __DIR__ . "/vendor/autoload.php";

use App\application\usecase\GeneretorPdfHandler;
use App\infrastructure\http\SlimHttpServer;
use App\infrastructure\pdf\DomCreatorPdf;
use App\presentation\controllers\CreatorPdfControllers;



function main(): void
{
    $DomCreatorPdf = new DomCreatorPdf();
    $GeneretorPdfHandler = new GeneretorPdfHandler($DomCreatorPdf);
    $CreatorPdfControllers = new CreatorPdfControllers($GeneretorPdfHandler);
    $httpServer = new SlimHttpServer();
    $httpServer->register($CreatorPdfControllers);
    $httpServer->listen();
}
main();
