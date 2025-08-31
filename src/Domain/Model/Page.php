<?php

namespace PdfExtractor\Domain\Model;

class Page
{
    public int $number;
    /** @var Block[] */
    public array $blocks = [];

    public function __construct(int $number, array $blocks)
    {
        $this->number = $number;
        $this->blocks = $blocks;
    }
}
