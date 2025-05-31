<?php

namespace App\domain\interfaces;

interface HttpServer
{
    function listen(): void;
    function on(string $method, string $path, callable $execute): void;
}
