<?php

namespace App\domain\interfaces;

use App\domain\entities\Document;

interface CreatorPdf
{
    function  save(Document $document):mixed;
}
