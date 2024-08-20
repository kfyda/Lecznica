<?php

namespace App\Filament\Resources;

use App\Enums\CategoryTypes;
use App\Filament\Resources\ShopResource\Pages;
use App\Filament\Resources\ShopResource\RelationManagers;
use App\Models\Shop;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ShopResource extends Resource
{
    protected static ?string $model = Shop::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $modelLabel = 'przedmiot';
    protected static ?string $pluralLabel = 'przedmioty';
    protected static ?string $navigationLabel = 'Przedmioty w sklepie';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nazwa przedmiotu')
                    ->required()
                    ->maxLength(128),
                Forms\Components\TextInput::make('price')
                    ->label('Cena')
                    ->required()
                    ->numeric()
                    ->suffix('zł')
                    ->rules('regex:/^\d{1,6}(\.\d{0,2})?$/'),
                Forms\Components\Select::make('category')
                    ->label("Kategorie")
                    ->required()
                    ->options(CategoryTypes::class),
                Forms\Components\Textarea::make('description')
                    ->label('Opis')
                    ->rows(5)
                    ->autosize()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_available')
                    ->label('Czy jest na stanie?')
                    ->default(true)
                    ->required(),
                Forms\Components\FileUpload::make('image_path')
                    ->label('Zdjęcie')
                    ->image()
                    ->required()
                    ->imageEditor()
                    ->openable()
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string => (string)str($file->getClientOriginalName())
                            ->prepend(now()->timestamp),
                    )
                    ->directory('shop-images')
                    ->preserveFilenames(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Zdjęcie'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nazwa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('URL')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Cena')
                    ->money('PLN')
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->label("Kategoria")
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_available')
                    ->label('Czy jest na stanie?')
                    ->boolean(),
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
            'index' => Pages\ListShops::route('/'),
            'create' => Pages\CreateShop::route('/create'),
            'view' => Pages\ViewShop::route('/{record}'),
            'edit' => Pages\EditShop::route('/{record}/edit'),
        ];
    }
}
