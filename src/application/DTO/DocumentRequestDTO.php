<?php

namespace App\application\DTO;

class DocumentRequestDTO
{
    public string $title;
    public string $content;
    public string $path;
    public  function __construct(string $title,  string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }
}
