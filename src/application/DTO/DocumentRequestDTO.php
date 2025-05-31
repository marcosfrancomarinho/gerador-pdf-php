<?php

namespace App\application\DTO;

class DocumentRequestDTO
{
    public string $title;
    public string $content;
    public string $path;
    public  function __construct(string $title,  string $content, string $path)
    {
        $this->title = $title;
        $this->path = $path;
        $this->content = $content;
    }
}
