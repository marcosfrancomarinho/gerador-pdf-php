<?php

namespace App\domain\interfaces;

interface HttpServer
{
    function listen(): void;
    function register(HttpControllers $http_controllers): void;
}
