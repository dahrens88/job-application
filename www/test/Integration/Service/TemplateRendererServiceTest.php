<?php

declare(strict_types=1);

namespace Dah\JobApplication\Test\Integration\Service;

use Dah\JobApplication\Enum\TwigTemplateEnum;
use Dah\JobApplication\Service\TemplateRendererService;
use Dah\JobApplication\Testing\AbstractIntegrationTest;
use Twig\Environment as TwigRenderer;
use Twig\Loader\FilesystemLoader;

final class TemplateRendererServiceTest extends AbstractIntegrationTest
{
    /**
     * @test
     */
    public function itCanBeConstructedByContainer(): void
    {
        self::assertInstanceOf(
            TemplateRendererService::class,
            $this->getContainer()->get(TemplateRendererService::class)
        );
    }

    /**
     * @test
     */
    public function itShouldRenderATwigTemplate(): void
    {
        $service = new TemplateRendererService(
            new TwigRenderer(
                new FilesystemLoader(__DIR__ . '/../../fixtures/view/templates')
            )
        );

        self::assertEquals(
            <<<EOT
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Test</title>
    </head>
    <body></body>
</html>
EOT,
            $service->render(TwigTemplateEnum::OVERVIEW())
        );
    }
}
