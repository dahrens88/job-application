<?php

declare(strict_types=1);

namespace Dah\JobApplication\Service;

use mikehaertl\wkhtmlto\Pdf;

final class PdfCreationService
{
    public const PDF_EXTENSION = 'pdf';

    private Pdf $pdf;

    // @TODO: Define as non shared service
    public function __construct(Pdf $pdf) 
    {
        $this->pdf = $pdf;
    }

    public function createPdf(
        string $fileName,
        string $content
    ): bool {
        $pdf = clone $this->pdf;
        
        return $pdf
            ->addPage($content)
            ->send($fileName . '.' . self::PDF_EXTENSION);
    }
}
