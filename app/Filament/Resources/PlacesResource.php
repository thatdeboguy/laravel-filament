<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlacesResource\Pages;
use App\Filament\Resources\PlacesResource\RelationManagers;
use App\Models\Places;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlacesResource extends Resource
{
    protected static ?string $model = Places::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Resources';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title'),
                Forms\Components\TextInput::make('slug'),
                Forms\Components\TextInput::make('zip-code'),
                Forms\Components\TextInput::make('name_tr')
                    ->required(),
                Forms\Components\TextInput::make('name_en')
                    ->required(),
                Forms\Components\Section::make('Geo')
                    ->schema([
                        Forms\Components\TextInput::make('Latitude')
                            ->required(),
                        Forms\Components\TextInput::make('Longitude')
                            ->required(),
                    ])->columns(2),
                
                Forms\Components\MarkdownEditor::make('Description')
                    ->required()
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListPlaces::route('/'),
            'create' => Pages\CreatePlaces::route('/create'),
            'edit' => Pages\EditPlaces::route('/{record}/edit'),
        ];
    }
}
