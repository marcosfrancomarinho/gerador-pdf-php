<?php

namespace App\application\usecase;

use App\application\DTO\DocumentRequestDTO;
use App\application\DTO\DocumentResponseDTO;
use App\domain\entities\Document;
use App\domain\interfaces\CreatorPdf;

class GeneretorPdfHandler
{
    private CreatorPdf $creatorPdf;
    public function __construct(CreatorPdf $creatorPdf)
    {
        $this->creatorPdf = $creatorPdf;
    }

    public function save(DocumentRequestDTO $input): DocumentResponseDTO
    {
        $document = Document::create($input->title, $input->content, $input->path);
        $this->creatorPdf->save($document);

        $responseGeneretePdf = new DocumentResponseDTO($document->getNameFilePdf(), 'pdf genereted with success');
        return $responseGeneretePdf;
    }
}
