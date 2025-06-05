<?php

namespace App\domain\interfaces;

interface HttpContext
{
    /** @return array{title:string,content:string } */
    function getRequestBody();
    function send(int $status, mixed $datas): mixed;
}
