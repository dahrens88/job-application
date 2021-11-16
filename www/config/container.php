<?php

declare(strict_types=1);

use Dah\JobApplication\Enum\Map\Factory\TemplateUrlToTwigTemplateEnumMapFactory;
use Dah\JobApplication\Enum\Map\TemplateUrlPathToTwigTemplateEnumMap;
use Dah\JobApplication\Factory\PdfFactory;
use Dah\JobApplication\Factory\RequestFactory;
use Dah\JobApplication\Service\ImageToBase64EncoderService;
use Dah\JobApplication\Service\PdfCreationService;
use Dah\JobApplication\Service\TemplateRendererService;
use mikehaertl\wkhtmlto\Pdf;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment as TwigRenderer;
use Twig\Loader\FilesystemLoader;

return (static function (): ContainerInterface {

    $containerBuilder = new ContainerBuilder();

    $requestDefinition = (new Definition(Request::class))
        ->setFactory([RequestFactory::class, 'create']);

    $containerBuilder->setDefinition(
        Request::class,
        $requestDefinition
    );

    $pdfDefinition = (new Definition(Pdf::class))
        ->setFactory([PdfFactory::class, 'create']);

    $containerBuilder->setDefinition(
        Pdf::class,
        $pdfDefinition
    );

    $containerBuilder->setDefinition(
        ImageToBase64EncoderService::class,
        new Definition(ImageToBase64EncoderService::class)
    );

    $containerBuilder
        ->setDefinition(
            TemplateUrlPathToTwigTemplateEnumMap::class,
            (new Definition(TemplateUrlPathToTwigTemplateEnumMap::class))
                ->setFactory([TemplateUrlToTwigTemplateEnumMapFactory::class, 'create'])
        );

    $loader = new FilesystemLoader(__DIR__ . '/../view/templates');
    $twig = new TwigRenderer($loader);

    $containerBuilder
        ->setDefinition(
            TemplateRendererService::class,
            (new Definition(TemplateRendererService::class))
                ->addArgument($twig)
                ->addArgument($requestDefinition)
        );

    $containerBuilder
        ->setDefinition(
            PdfCreationService::class,
            (new Definition(PdfCreationService::class))
                ->addArgument($pdfDefinition)
        );

    return $containerBuilder;
})();
