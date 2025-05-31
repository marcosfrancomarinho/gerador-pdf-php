<?php

namespace App\infrastructure\pdf;

use App\domain\entities\Document;
use App\domain\interfaces\CreatorPdf;
use Dompdf\Dompdf;

class DomCreatorPdf implements CreatorPdf
{
    public function save(Document $document): void
    {
        $dompdf = new Dompdf();
        $html = $document->getHtmlToGeneretePdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents($document->getPath(), $output);
    }
}
