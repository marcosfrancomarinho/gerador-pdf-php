<?php
namespace App\domain\interfaces;
interface HttpControllers {
    function execute(HttpContext $httpContext);
}