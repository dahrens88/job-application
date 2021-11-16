<?php

declare(strict_types=1);

namespace Dah\JobApplication\Exception;

use RuntimeException;

final class CannotReadImageFileException extends RuntimeException implements JobApplicationExceptionInterface
{

}
