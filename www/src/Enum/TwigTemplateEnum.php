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
final class TwigTemplateEnum extends Enum
{
    public const COVER_LETTER = 'cover-letter.html.twig';
    public const COVER_SHEET = 'cover-sheet.html.twig';
    public const CV1 = 'cv1.html.twig';
    public const CV2 = 'cv2.html.twig';
    public const OVERVIEW = 'overview.html.twig';
    public const WRITE_TO = 'write-to.html.twig';
}
