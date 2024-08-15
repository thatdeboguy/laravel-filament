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

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $navigationGroup = 'Resources';
    protected static ?int $navigationSort = 0;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title'),
                Forms\Components\TextInput::make('slug'),
                Forms\Components\TextInput::make('zip-code'),
                Forms\Components\KeyValue::make('name')
                    ->schema([
                        Forms\Components\TextInput::make('name_tr')
                            ->required(),
                        Forms\Components\TextInput::make('name_en')
                            ->required(),
                    ]),
                // Forms\Components\TextInput::make('name_tr')
                //     ->required(),
                // Forms\Components\TextInput::make('name_en')
                //     ->required(),
                Forms\Components\KeyValue::make('geoposition')
                    ->schema([
                        Forms\Components\TextInput::make('Latitude')
                            ->required(),
                        Forms\Components\TextInput::make('Longitude')
                            ->required(),
                    ]),
                // Forms\Components\Section::make('Geo')
                //     ->schema([
                //         Forms\Components\TextInput::make('Latitude')
                //             ->required(),
                //         Forms\Components\TextInput::make('Longitude')
                //             ->required(),
                //     ])->columns(2),
                
                Forms\Components\MarkdownEditor::make('description')
                    ->required()
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('zip-code'),
                Tables\Columns\TextColumn::make('geoposition'),
                Tables\Columns\TextColumn::make('description'),
                //Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                
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
