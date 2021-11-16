<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ContainerControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;

require __DIR__ . '/../bootstrap.php';

/** @var ContainerInterface $container */
$container = require __DIR__ . '/../config/container.php';
$routes = include __DIR__.'/../config/routes.php';

$request = Request::createFromGlobals();

$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

try {
    $attributes = $matcher->match($request->getPathInfo());
    $request->attributes->add($attributes);

    $controllerResolver = new ContainerControllerResolver($container);
    $argumentResolver = new ArgumentResolver();

    $controller = $controllerResolver->getController($request);
    $arguments = array_map(
        fn (string $argument) => $container->has($argument) ? $container->get($argument) : $argument,
        $argumentResolver->getArguments($request, $controller)
    );

    $response = call_user_func_array($controller, $arguments);

} catch (ResourceNotFoundException $exception) {
    $response = new Response('Page not found', Response::HTTP_NOT_FOUND);
} catch (Throwable $exception) {
    $response = new Response('An error occurred', Response::HTTP_INTERNAL_SERVER_ERROR);
}

$response->send();