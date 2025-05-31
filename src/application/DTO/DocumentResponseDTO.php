<?php

namespace App\application\DTO;

class DocumentResponseDTO
{
    public string $name;
    public string $message;
    public function __construct(string $name, string $message)
    {
        $this->message = $message;
        $this->name = $name;
    }
}
