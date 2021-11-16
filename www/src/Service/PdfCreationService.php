<?php

declare(strict_types=1);

namespace Dah\JobApplication\Service;

use mikehaertl\wkhtmlto\Pdf;

final class PdfCreationService
{
    public const PDF_EXTENSION = 'pdf';

    private Pdf $pdf;

    public function __construct(Pdf $pdf)
    {
        $this->pdf = clone $pdf;
    }

    public function createPdf(
        string $fileName,
        string $content
    ): bool {
        return $this->pdf
            ->addPage($content)
            ->send($fileName . '.' . self::PDF_EXTENSION);
    }
}