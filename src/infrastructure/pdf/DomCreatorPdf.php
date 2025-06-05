<?php

namespace App\infrastructure\pdf;

use App\domain\entities\Document;
use App\domain\interfaces\CreatorPdf;
use Dompdf\Dompdf;

class DomCreatorPdf implements CreatorPdf
{
    public function save(Document $document):mixed
    {
        $dompdf = new Dompdf();
        $html = $document->getHtmlToGeneretePdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();
       return $output;
    }
}
