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
            ["title" => $title, "content" => $content, "path" => $path] = $httpContext->getRequestBody();
            $input = new DocumentRequestDTO($title, $content, $path);
            $output = $this->generetorPdfHandler->save($input);
            return $httpContext->send(200, ["message" => $output->message, "name_file" => $output->name]);
        } catch (\Throwable $e) {
            return $httpContext->send(400, ["error" => $e->getMessage()]);
        }
    }
}
