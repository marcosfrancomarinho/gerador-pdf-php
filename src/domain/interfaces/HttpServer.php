<?php

namespace App\domain\interfaces;

interface HttpServer
{
    function run(): void;
    function on(string $method, string $path, callable $execute): void;
}
