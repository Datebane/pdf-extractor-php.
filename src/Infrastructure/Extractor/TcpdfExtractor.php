<?php

namespace PdfExtractor\Infrastructure\Extractor;

use PdfExtractor\Domain\Model\Block;
use PdfExtractor\Domain\Model\Document;
use PdfExtractor\Domain\Model\Page;
use PdfExtractor\Domain\PdfExtractorInterface;

class TcpdfExtractor implements PdfExtractorInterface
{
    public function extract(string $filePath): Document
    {
        // TODO: Реалізація через TCPDF/FPDI, зараз мок
        $page = new Page(1, [new Block("Stub text from $filePath")]);
        return new Document($filePath, [$page]);
    }
}
