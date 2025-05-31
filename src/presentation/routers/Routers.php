<?php

namespace App\presentation\routers;

use App\domain\interfaces\HttpServer;
use App\shared\Container\Container;

class Routers
{
    private HttpServer $http_server;
    public function __construct(HttpServer $http_server)
    {
        $this->http_server = $http_server;
    }

    public function register(Container $container)
    {
        ["createPdfControllers" => $create] = $container->dependencie();

        $this->http_server->on('post', '/', [$create, 'execute']);
    }
}
