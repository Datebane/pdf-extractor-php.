<?php

namespace PdfExtractor\Domain;

use PdfExtractor\Domain\Model\Document;

interface PdfExtractorInterface
{
    public function extract(string $filePath): Document;
}
