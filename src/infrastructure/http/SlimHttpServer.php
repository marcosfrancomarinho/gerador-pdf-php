<?php

namespace App\infrastructure\http;

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

    public function on(string $method, string $path, callable $execute): void
    {
        $this->app->$method($path, function (Request $request, Response $response) use ($execute) {
            $http = new SlimHttpContext($request, $response);
            return $execute($http);
        });
    }
}
