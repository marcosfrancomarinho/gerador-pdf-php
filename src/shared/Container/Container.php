<?php

namespace App\shared\Container;
use App\application\usecase\GeneretorPdfHandler;
use App\infrastructure\pdf\DomCreatorPdf;
use App\infrastructure\pdf\TcCreatorPdf;
use App\presentation\controllers\CreatorPdfControllers;

class Container
{
    public function dependencie()
    {
        $creatorPdf = new TcCreatorPdf() ?? new DomCreatorPdf();
        $generetorPdfHandler = new GeneretorPdfHandler($creatorPdf);
        $creatorPdfControllers = new CreatorPdfControllers($generetorPdfHandler);
        return [
            "createPdfControllers" => $creatorPdfControllers
        ];
    }
}
