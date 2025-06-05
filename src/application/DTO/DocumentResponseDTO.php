<?php

namespace App\application\DTO;

class DocumentResponseDTO
{
    public string $name;
    public string $file;
    public function __construct(string $name, string $file)
    {
        $this->file = $file;
        $this->name = $name;
    }
}
