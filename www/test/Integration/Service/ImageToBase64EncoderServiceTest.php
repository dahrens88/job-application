<?php

declare(strict_types=1);

namespace Dah\JobApplication\Test\Integration\Service;

use Dah\JobApplication\Service\ImageToBase64EncoderService;
use Dah\JobApplication\Testing\AbstractIntegrationTest;

final class ImageToBase64EncoderServiceTest extends AbstractIntegrationTest
{
    /**
     * @test
     */
    public function itCanBeConstructedByContainer(): void
    {
        self::assertInstanceOf(
            ImageToBase64EncoderService::class,
            $this->getContainer()->get(ImageToBase64EncoderService::class)
        );
    }
}
