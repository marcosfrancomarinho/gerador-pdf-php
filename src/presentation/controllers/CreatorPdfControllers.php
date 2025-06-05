<?php

namespace App\presentation\controllers;

use App\application\DTO\DocumentRequestDTO;
use App\application\usecase\GeneretorPdfHandler;
use App\domain\interfaces\HttpContext;
use App\domain\interfaces\HttpControllers;


class CreatorPdfControllers implements HttpControllers
{
    private GeneretorPdfHandler $generetorPdfHandler;
    public function __construct(GeneretorPdfHandler $generetorPdfHandler)
    {
        $this->generetorPdfHandler = $generetorPdfHandler;
    }

    public function execute(HttpContext $httpContext)
    {
        try {
            ["title" => $title, "content" => $content] = $httpContext->getRequestBody();
            $input = new DocumentRequestDTO($title, $content);
            $output = $this->generetorPdfHandler->save($input);
            return $httpContext->send(200, ["file" => $output->file, "name_file" => $output->name]);
        } catch (\Throwable $e) {
            return $httpContext->handleError(400, ["error" => $e->getMessage()]);
        }
    }
}
