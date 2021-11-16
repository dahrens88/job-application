<?php

declare(strict_types=1);

use Dah\JobApplication\Service\ImageToBase64EncoderService;
use Dah\JobApplication\Service\TemplateRendererService;
use Dah\JobApplication\Enum\Map\TemplateUrlPathToTwigTemplateEnumMap;
use Dah\JobApplication\Service\PdfCreationService;
use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Request;

$routes = new Routing\RouteCollection();

$routes->add(
    'default',
    new Routing\Route(
        '/',
        [
            '_controller' => '\Dah\JobApplication\Controller\OverviewPageController::index',
            'templateRendererService' => TemplateRendererService::class,
            'request' => Request::class,
        ]
    )
);

$routes->add(
    'selectTemplatePage',
    new Routing\Route(
        '/select-template/{templateUrlPath}',
        [
            '_controller' => '\Dah\JobApplication\Controller\OverviewPageController::selectTemplate',
            'templateRendererService' => TemplateRendererService::class,
            'request' => Request::class,
        ]
    )
);

$routes->add(
    'templatePage',
    new Routing\Route(
        '/template/{templateUrlPath}',
        [
            '_controller' => '\Dah\JobApplication\Controller\ContentPageController::index',
            'templateRendererService' => TemplateRendererService::class,
            'imageToBase64EncoderService' => ImageToBase64EncoderService::class,
            'templateUrlPathToTwigTemplateEnumMap' => TemplateUrlPathToTwigTemplateEnumMap::class,
        ]
    )
);

$routes->add(
    'createPdf',
    new Routing\Route(
        '/create-pdf/{templateUrlPath}',
        [
            '_controller' => '\Dah\JobApplication\Controller\CreatePdfController::index',
            'templateRendererService' => TemplateRendererService::class,
            'pdfCreationService' => PdfCreationService::class,
            'imageToBase64EncoderService' => ImageToBase64EncoderService::class,
            'templateUrlPathToTwigTemplateEnumMap' => TemplateUrlPathToTwigTemplateEnumMap::class,
        ]
    )
);

return $routes;