<?php

namespace App\infrastructure\http;

use App\domain\interfaces\HttpControllers;
use App\domain\interfaces\HttpServer;
use Slim\Factory\AppFactory;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class SlimHttpServer implements HttpServer
{
    private $app;
    public function __construct()
    {
        $this->app = AppFactory::create();
    }
    public function listen(): void
    {
        $this->app->run();
    }

    public function register(HttpControllers $http_controllers): void
    {
        $this->app->post("/", function (Request $request, Response $response) use ($http_controllers) {
            $http = new SlimHttpContext($request, $response);
            return $http_controllers->execute($http);
        });
    }
}
