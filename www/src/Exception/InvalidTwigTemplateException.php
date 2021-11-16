<?php

declare(strict_types=1);

namespace Dah\JobApplication\Exception;

use InvalidArgumentException;

final class InvalidTwigTemplateException extends InvalidArgumentException implements JobApplicationExceptionInterface
{

}
