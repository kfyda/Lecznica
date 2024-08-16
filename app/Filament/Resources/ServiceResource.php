<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?string $modelLabel = 'usługa';
    protected static ?string $pluralLabel = 'usługi';
    protected static ?string $navigationLabel = 'Usługi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nazwa usługi')
                        ->required()
                        ->unique(ignorable: fn($record) => $record)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                            if ($operation !== 'create') return;

                            $set('slug', Str::slug($state));
                        })
                        ->maxLength(128),
                    Forms\Components\TextInput::make('slug')
                        ->label('URL')
                        ->required()
                        ->disabled()
                        ->dehydrated()
                        ->unique(ignorable: fn($record) => $record)
                        ->maxLength(256),
                ]),
//                Forms\Components\TextInput::make('price')
//                    ->label('Cena')
//                    ->required()
//                    ->numeric()
//                    ->suffix('zł')
//                    ->rules('regex:/^\d{1,6}(\.\d{0,2})?$/'),
                Forms\Components\FileUpload::make('image_path')
                    ->label('Zdjęcia')
                    ->image()
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                            ->prepend(now()->timestamp),
                    )
                    ->directory('service-images')
//                    ->multiple()
                    ->preserveFilenames(),
                Forms\Components\RichEditor::make('description')
                    ->label('Opis')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Zdjęcia')
//                    ->stacked()
                    ->limit(5),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nazwa usługi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('URL')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
//                Tables\Columns\TextColumn::make('price')
//                    ->label('Cena')
//                    ->money('PLN')
//                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data utworzenia')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Data aktualizacji')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'view' => Pages\ViewService::route('/{record}'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
