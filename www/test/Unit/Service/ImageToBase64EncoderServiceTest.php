<?php

declare(strict_types=1);

namespace Dah\JobApplication\Test\Unit\Service;

use Dah\JobApplication\Exception\CannotReadImageFileException;
use Dah\JobApplication\Service\ImageToBase64EncoderService;
use PHPUnit\Framework\TestCase;

final class ImageToBase64EncoderServiceTest extends TestCase
{
    private const IMAGE_PATH = __DIR__ . '/../../fixtures/images/1px.jpg';

    /**
     * @test
     */
    public function itShouldThrowCannotReadImageFileException(): void
    {
        $service = new ImageToBase64EncoderService();
        self::expectException(CannotReadImageFileException::class);
        $service->encode('wrong-path');
    }

    /**
     * @test
     */
    public function itShouldReturnBase64EncodedImage(): void
    {
        $service = new ImageToBase64EncoderService();

        $base64EncodedImage = $service->encode(self::IMAGE_PATH);

        self::assertEquals(
            'data:image/jpg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAIBAQEBAQIBAQECAgICAgQDAgICAgUEBAMEBgUGBgYFBgYGBwkIBgcJBwYGCAsICQoKCgoKBggLDAsKDAkKCgr/2wBDAQICAgICAgUDAwUKBwYHCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgr/wgARCAABAAEDAREAAhEBAxEB/8QAFAABAAAAAAAAAAAAAAAAAAAACf/EABQBAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhADEAAAAH8P/8QAFBABAAAAAAAAAAAAAAAAAAAAAP/aAAgBAQABPwB//8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAgBAgEBPwB//8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAgBAwEBPwB//9k=',
            $base64EncodedImage
        );
    }
}
