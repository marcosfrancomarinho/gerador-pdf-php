<?php

namespace App\infrastructure\pdf;

use App\domain\entities\Document;
use App\domain\interfaces\CreatorPdf;
use TCPDF;

class TcCreatorPdf implements CreatorPdf
{
    public function save(Document $document):mixed
    {
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetAutoPageBreak(true, 20);
        $pdf->AddPage();
        $pdf->writeHTML($document->getHtmlToGeneretePdf());
        $output = $pdf->Output('', 'S');
        return $output;
    }
}
