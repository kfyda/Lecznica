<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CategoryTypes:string implements HasLabel
{
    case FOOD = 'pożywienie';
    case TOY = 'zabawki';
    case FOOD_CONTAINER = 'pojemniki/miski';
    case ACCESSORIES = 'akcesoria';
    case CARE = 'pielęgnacja i higiena';
    case DIETARY_SUPPLEMENTS = 'suplementy diety';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::FOOD => 'Pożywienie',
            self::TOY => 'Zabawki',
            self::FOOD_CONTAINER => 'Pojemniki na jedzenie i wodę',
            self::ACCESSORIES => 'Akcesoria',
            self::CARE => 'Pielęgnacja i higiena',
            self::DIETARY_SUPPLEMENTS => 'Suplementy diety'
        };
    }
}
