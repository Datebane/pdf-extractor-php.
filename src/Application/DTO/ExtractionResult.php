<?php

namespace PdfExtractor\Application\DTO;

class ExtractionResult
{
    public string $txtPath;
    public string $jsonPath;

    public function __construct(string $txtPath, string $jsonPath)
    {
        $this->txtPath = $txtPath;
        $this->jsonPath = $jsonPath;
    }
}
