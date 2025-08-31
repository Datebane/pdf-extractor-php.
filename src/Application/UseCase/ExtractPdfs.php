<?php

namespace PdfExtractor\Application\UseCase;

use PdfExtractor\Application\DTO\ExtractionConfig;
use PdfExtractor\Application\DTO\ExtractionResult;
use PdfExtractor\Domain\PdfExtractorInterface;
use PdfExtractor\Domain\Service\Aggregator;
use PdfExtractor\Infrastructure\FS\LocalStorage;

class ExtractPdfs
{
    private PdfExtractorInterface $extractor;
    private Aggregator $aggregator;
    private LocalStorage $storage;

    public function __construct(
        PdfExtractorInterface $extractor,
        Aggregator $aggregator,
        LocalStorage $storage
    ) {
        $this->extractor = $extractor;
        $this->aggregator = $aggregator;
        $this->storage = $storage;
    }

    public function execute(ExtractionConfig $config): ExtractionResult
    {
        $documents = [];

        foreach ($this->storage->listPdfs($config->inputDir) as $pdfPath) {
            $documents[] = $this->extractor->extract($pdfPath);
        }

        $txt = $this->aggregator->toTxt($documents);
        $json = $this->aggregator->toJson($documents);

        $txtPath = $config->outputDir . '/combined.txt';
        $jsonPath = $config->outputDir . '/combined.json';

        $this->storage->write($txtPath, $txt);
        $this->storage->write($jsonPath, $json);

        return new ExtractionResult($txtPath, $jsonPath);
    }
}
