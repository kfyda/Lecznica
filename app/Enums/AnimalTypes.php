<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AnimalTypes: string implements HasLabel
{
    case DOG = 'Psy';
    case CAT = 'Koty';
    case RODENTS = 'Gryzonie';
    case PIGEON = 'Gołębie';
    case FOWL = 'Drób';
    case FARM_ANIMALS = 'Zwierzęta gosp.';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::DOG => 'Psy',
            self::CAT => 'Koty',
            self::RODENTS => 'Gryzonie (chomiki, świnki morskie, szczury)',
            self::PIGEON => 'Gołębie',
            self::FOWL => 'Drób (kury, indyki, kaczki, gęsi)',
            self::FARM_ANIMALS => 'Zwierzęta gospodarcze (krowy, świnie, owce, kozy)'
        };
    }
}
