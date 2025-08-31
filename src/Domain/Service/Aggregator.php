<?php

namespace PdfExtractor\Domain\Service;

use PdfExtractor\Domain\Model\Document;

class Aggregator
{
    /**
     * @param Document[] $documents
     */
    public function toTxt(array $documents): string
    {
        $out = "";
        foreach ($documents as $doc) {
            $out .= "FILE: {$doc->filePath}\n";
            foreach ($doc->pages as $page) {
                $out .= "  Page {$page->number}\n";
                foreach ($page->blocks as $block) {
                    $out .= "    {$block->text}\n";
                }
            }
            $out .= "\n";
        }
        return $out;
    }

    /**
     * @param Document[] $documents
     */
    public function toJson(array $documents): string
    {
        return json_encode($documents, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
