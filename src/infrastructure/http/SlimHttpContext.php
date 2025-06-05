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
        $this->response->getBody()->write($datas["file"]);
        return $this->response->withHeader("Content-Type", "application/pdf")->withStatus($status)->withHeader('Content-Disposition', 'inline; filename=' . $datas["name_file"]);
    }
    public function getRequestBody()
    {
        $body = $this->request->getBody();
        $body->rewind();
        $contents = $body->getContents();
        $datas = json_decode($contents, true);

        return [
            "title" => $datas['title'] ?? "",
            "content" => $datas['content'] ?? ""
        ];
    }
}
