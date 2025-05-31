<?php

namespace App\infrastructure\http;

use App\domain\interfaces\HttpContext;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class SlimHttpContext implements HttpContext
{
    private Request $request;
    private Response $response;
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    function send(int $status, mixed $datas): mixed
    {
        $this->response->getBody()->write(json_encode($datas));
        return $this->response->withHeader("Content-Type", "application/json")->withStatus($status);
    }
    public function getRequestBody()
    {
        $body = $this->request->getBody();
        $body->rewind();
        $contents = $body->getContents();
        $datas = json_decode($contents, true);

        return [
            "title" => $datas['title'] ?? "",
            "content" => $datas['content'] ?? "",
            "path" => $datas['path'] ?? ""
        ];
    }
}
