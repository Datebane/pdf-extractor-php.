<?php

namespace PdfExtractor\Domain\Model;

class Document
{
    public string $filePath;
    /** @var Page[] */
    public array $pages = [];

    public function __construct(string $filePath, array $pages)
    {
        $this->filePath = $filePath;
        $this->pages = $pages;
    }
}
