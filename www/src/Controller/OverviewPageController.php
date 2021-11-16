<?php

declare(strict_types=1);

namespace Dah\JobApplication\Controller;

use Dah\JobApplication\Enum\TemplateUrlPathEnum;
use Dah\JobApplication\Enum\TwigTemplateEnum;
use Dah\JobApplication\Service\TemplateRendererService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class OverviewPageController
{
    public function index(
        TemplateRendererService $templateRendererService,
        Request $request
    ): Response {
        return new Response(
            $templateRendererService->render(
                TwigTemplateEnum::OVERVIEW(),
                [
                    'baseUrl' => $request->getSchemeAndHttpHost(),
                    'templateUrlPath' => TemplateUrlPathEnum::COVER_SHEET,
                ]
            )
        );
    }

    public function selectTemplate(
        string $templateUrlPath,
        TemplateRendererService $templateRendererService,
        Request $request
    ): Response {
        $templateUrl = TemplateUrlPathEnum::byValue($templateUrlPath);

        return new Response(
            $templateRendererService->render(
                TwigTemplateEnum::OVERVIEW(),
                [
                    'baseUrl' => $request->getSchemeAndHttpHost(),
                    'templateUrlPath' => $templateUrl->getValue(),
                ]
            )
        );
    }
}