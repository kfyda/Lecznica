<?php

namespace App\Filament\Resources\ShopResource\Pages;

use App\Filament\Resources\ShopResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateShop extends CreateRecord
{
    protected static string $resource = ShopResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = now()->timestamp . '-' . Str::slug($data['name']);

        return $data;
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Dodano przedmiot')
            ->body('Nowy przedmiot został dodany!');
    }
}
