<?php

declare(strict_types=1);

namespace Dah\JobApplication\Service;

use Dah\JobApplication\Enum\TwigTemplateEnum;
use Twig\Environment as TwigRenderer;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

final class TemplateRendererService
{
    private TwigRenderer $twigRenderer;

    public function __construct(TwigRenderer $twigRenderer)
    {
        $this->twigRenderer = $twigRenderer;
    }

    /**
     * @param TwigTemplateEnum     $twigTemplateEnum
     * @param array<string, mixed> $templateData
     *
     * @return string
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render(
        TwigTemplateEnum $twigTemplateEnum,
        array $templateData = []
    ): string {
        return $this->twigRenderer->render(
            $twigTemplateEnum->getValue(),
            $templateData
        );
    }
}