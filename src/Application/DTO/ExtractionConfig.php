<?php

namespace PdfExtractor\Application\DTO;

class ExtractionConfig
{
    public string $inputDir;
    public string $outputDir;

    public function __construct(string $inputDir, string $outputDir)
    {
        $this->inputDir = rtrim($inputDir, '/');
        $this->outputDir = rtrim($outputDir, '/');
    }
}
