<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use App\Models\Gallery;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageGalleries extends ManageRecords
{
    protected static string $resource = GalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->mutateFormDataUsing(function (Actions\CreateAction $action, array $data): array {
                    foreach ($data['image_path'] as $key => $value)
                    {
                        $gallery = new Gallery();
                        $gallery->create([
                            'image_path' => $value
                        ]);
                    }

                    $action->cancel();
                })
                ->successNotificationTitle('Dodano nowe zdjęcie!'),
        ];
    }
}
