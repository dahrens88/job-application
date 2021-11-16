<?php

declare(strict_types=1);

namespace Dah\JobApplication\Enum;

use MabeEnum\Enum;

/**
 * @method static self COVER_LETTER()
 * @method static self COVER_SHEET()
 * @method static self CV1()
 * @method static self CV2()
 * @method static self OVERVIEW()
 * @method static self WRITE_TO()
 */
final class TemplateUrlPathEnum extends Enum
{
    public const COVER_LETTER = 'cover-letter';
    public const COVER_SHEET = 'cover-sheet';
    public const CV1 = 'cv1';
    public const CV2 = 'cv2';
    public const OVERVIEW = 'overview';
    public const WRITE_TO = 'write-to';
}
