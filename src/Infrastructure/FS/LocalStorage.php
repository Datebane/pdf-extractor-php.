<?php

namespace PdfExtractor\Infrastructure\FS;

class LocalStorage
{
    public function listPdfs(string $dir): array
    {
        return glob($dir . '/*.pdf') ?: [];
    }

    public function write(string $path, string $content): void
    {
        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }
        file_put_contents($path, $content);
    }
}
