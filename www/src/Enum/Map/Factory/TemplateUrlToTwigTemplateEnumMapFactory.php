<?php

declare(strict_types=1);

namespace Dah\JobApplication\Enum\Map\Factory;

use Dah\JobApplication\Enum\Map\TemplateUrlPathToTwigTemplateEnumMap;
use Dah\JobApplication\Enum\TemplateUrlPathEnum;
use Dah\JobApplication\Enum\TwigTemplateEnum;

final class TemplateUrlToTwigTemplateEnumMapFactory
{
    public function create(): TemplateUrlPathToTwigTemplateEnumMap
    {
        return new TemplateUrlPathToTwigTemplateEnumMap(
            TemplateUrlPathEnum::class,
            [
                TemplateUrlPathEnum::COVER_LETTER => TwigTemplateEnum::COVER_LETTER,
                TemplateUrlPathEnum::COVER_SHEET => TwigTemplateEnum::COVER_SHEET,
                TemplateUrlPathEnum::CV1 => TwigTemplateEnum::CV1,
                TemplateUrlPathEnum::CV2 => TwigTemplateEnum::CV2,
                TemplateUrlPathEnum::OVERVIEW => TwigTemplateEnum::OVERVIEW,
                TemplateUrlPathEnum::WRITE_TO => TwigTemplateEnum::WRITE_TO,
            ]
        );
    }
}
