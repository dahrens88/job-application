<?php

declare(strict_types=1);

namespace Dah\JobApplication\Service;

use Dah\JobApplication\Exception\CannotReadImageFileException;
use Throwable;

final class ImageToBase64EncoderService
{
    /**
     * @param string $imagePath
     *
     * @return string
     *
     * @throws CannotReadImageFileException
     */
    public function encode(string $imagePath): string
    {
        try {
            $data = file_get_contents($imagePath);
        } catch (Throwable $throwable) {
            throw new CannotReadImageFileException(
                sprintf(
                    'Cannot read image path: %s',
                    $imagePath
                )
            );
        }

        $type = (string)pathinfo($imagePath, PATHINFO_EXTENSION);

        return sprintf(
            'data:image/%s;base64,%s',
            $type,
            base64_encode($data)
        );
    }
}