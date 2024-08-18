<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Models\Service;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Collection;
use Filament\Notifications\Notification;
use Illuminate\Support\Str;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;
    protected int $serviceCap = 19;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    private function isUnderLimit(int $servColl):bool
    {
        if ($servColl >= $this->serviceCap) {
            return false;
        }
        return true;
    }

    protected function beforeCreate(): void
    {
        $serviceNumber = Service::count();

        if (!$this->isUnderLimit($serviceNumber)) {
            Notification::make()
                ->warning()
                ->title('Nie utworzono usługi')
                ->body('Przekroczono limit dodawania nowych usług (max 19).')
                ->send();

            $this->halt();
        }
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
            ->title('Dodano usługę')
            ->body('Nowa usługa została dodana!');
    }
}
