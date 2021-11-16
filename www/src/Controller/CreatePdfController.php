<?php

declare(strict_types=1);

namespace Dah\JobApplication\Controller;

use Dah\JobApplication\Enum\Map\TemplateUrlPathToTwigTemplateEnumMap;
use Dah\JobApplication\Enum\TwigTemplateEnum;
use Dah\JobApplication\Exception\InvalidTwigTemplateException;
use Dah\JobApplication\Service\ImageToBase64EncoderService;
use Dah\JobApplication\Service\PdfCreationService;
use Dah\JobApplication\Service\TemplateRendererService;
use Symfony\Component\HttpFoundation\Response;

final class CreatePdfController
{
    private const PHOTO_PATH = __DIR__ . '/../../public/assets/images/avatar.png';

    public function index(
        string $templateUrlPath,
        TemplateRendererService $templateRendererService,
        PdfCreationService $pdfCreationService,
        ImageToBase64EncoderService $imageToBase64EncoderService,
        TemplateUrlPathToTwigTemplateEnumMap $templateUrlPathToTwigTemplateEnumMap
    ): Response {
        $twigTemplate = $templateUrlPathToTwigTemplateEnumMap[$templateUrlPath] ?? null;

        if ($twigTemplate === null) {
            throw new InvalidTwigTemplateException(
                sprintf('No template found for given template url path: %s', $templateUrlPath)
            );
        }

        $content = $templateRendererService->render(
            TwigTemplateEnum::byValue($twigTemplate),
            [
                'photo' => $imageToBase64EncoderService->encode(
                    self::PHOTO_PATH
                ),
            ]
        );

        $pdfCreationService->createPdf($templateUrlPath, $content);

        return new Response();
    }
}