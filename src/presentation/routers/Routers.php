<?php

namespace App\presentation\routers;

use App\domain\interfaces\HttpControllers;
use App\domain\interfaces\HttpServer;
use App\presentation\controllers\CreatorPdfControllers;

class Routers
{
    private HttpServer $http_server;
    public function __construct(HttpServer $http_server)
    {
        $this->http_server = $http_server;
    }

    public function register(HttpControllers $http_controllers)
    {
        $this->http_server->on('post', '/', [$http_controllers, 'execute']);
    }
}
