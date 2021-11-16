<?php

declare(strict_types=1);

namespace Dah\JobApplication\Test\Integration\Service;

use Dah\JobApplication\Service\PdfCreationService;
use Dah\JobApplication\Testing\AbstractIntegrationTest;

final class PdfCreationServiceTest extends AbstractIntegrationTest
{
    /**
     * @test
     */
    public function itCanBeConstructedByContainer(): void
    {
        self::assertInstanceOf(
            PdfCreationService::class,
            $this->getContainer()->get(PdfCreationService::class)
        );
    }
}
