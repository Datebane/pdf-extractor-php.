<?php

namespace PdfExtractor\Infrastructure\Extractor;

use PdfExtractor\Domain\Model\Block;
use PdfExtractor\Domain\Model\Document;
use PdfExtractor\Domain\Model\Page;
use PdfExtractor\Domain\PdfExtractorInterface;
use Smalot\PdfParser\Parser;

class SmalotPdfExtractor implements PdfExtractorInterface
{
    private Parser $parser;

    public function __construct()
    {
        $this->parser = new Parser();
    }

    public function extract(string $filePath): Document
    {
        $pdf = $this->parser->parseFile($filePath);
        $pages = [];
        $num = 1;

        foreach ($pdf->getPages() as $page) {
            $text = $page->getText();
            $blocks = array_map(fn($line) => new Block($line), explode("\n", $text));
            $pages[] = new Page($num++, $blocks);
        }

        return new Document($filePath, $pages);
    }
}
