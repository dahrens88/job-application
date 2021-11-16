<?php

declare(strict_types=1);

namespace Dah\JobApplication\Factory;

use Symfony\Component\HttpFoundation\Request;

final class RequestFactory
{
    public static function create(): Request
    {
        return Request::createFromGlobals();
    }
}