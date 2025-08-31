<?php

namespace PdfExtractor\Presentation\Console;

use PdfExtractor\Application\DTO\ExtractionConfig;
use PdfExtractor\Application\UseCase\ExtractPdfs;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConvertCommand extends Command
{
    protected static $defaultName = 'convert';

    private ExtractPdfs $useCase;
    private string $inputDir;
    private string $outputDir;

    public function __construct(ExtractPdfs $useCase, string $inputDir, string $outputDir)
    {
        parent::__construct();
        $this->useCase = $useCase;
        $this->inputDir = $inputDir;
        $this->outputDir = $outputDir;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $config = new ExtractionConfig($this->inputDir, $this->outputDir);
        $result = $this->useCase->execute($config);

        $output->writeln("TXT saved to: " . $result->txtPath);
        $output->writeln("JSON saved to: " . $result->jsonPath);

        return Command::SUCCESS;
    }
}
