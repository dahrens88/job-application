<?php

declare(strict_types=1);

namespace Dah\JobApplication\Factory;

use mikehaertl\wkhtmlto\Pdf;

final class PdfFactory
{
    public static function create(): Pdf
    {
        return new Pdf(
            require_once __DIR__ . '/../../config/wkhtmltopdf_options.php'
        );
    }
}