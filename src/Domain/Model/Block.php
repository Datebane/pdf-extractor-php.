<?php

namespace PdfExtractor\Domain\Model;

class Block
{
    public string $text;

    public function __construct(string $text)
    {
        $this->text = trim($text);
    }
}
